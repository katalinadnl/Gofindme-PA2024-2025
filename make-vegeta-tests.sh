#!/bin/bash

TEST_DIR="tests-vegeta"

if [[ ! -d $TEST_DIR ]]; then
    echo "Le dossier $TEST_DIR n'existe pas. Création en cours..."
    mkdir -p $TEST_DIR
    echo "Dossier $TEST_DIR créé avec succès."
else
    echo "Le dossier $TEST_DIR existe déjà."
fi

CURRENT_DATE=$(date +%Y%m%d)

read -p "Veuillez entrer l'URL à tester : " url

# Vérifier que l'URL n'est pas vide
if [[ -z "$url" ]]; then
  echo "Erreur : l'URL ne peut pas être vide."
  exit 1
fi

# Créer un fichier de cible avec l'URL fournie
TARGET_FILE="$TEST_DIR/targets-$CURRENT_DATE.txt"
echo "GET $url" > $TARGET_FILE
echo "Cible ajoutée : $url (dans $TARGET_FILE)"

# Paramètres par défaut
DURATION="30s"
RATE=50

# Demander à l'utilisateur s'il veut personnaliser les paramètres
read -p "Souhaitez-vous personnaliser la durée (par défaut : 30s) ? (y/n) : " customize_duration
if [[ "$customize_duration" == "y" || "$customize_duration" == "Y" ]]; then
  read -p "Entrez la durée (ex : 10s, 1m) : " DURATION
fi

read -p "Souhaitez-vous personnaliser le taux (par défaut : 50 requêtes/s) ? (y/n) : " customize_rate
if [[ "$customize_rate" == "y" || "$customize_rate" == "Y" ]]; then
  read -p "Entrez le taux de requêtes par seconde : " RATE
fi

echo "Test démarrant avec les paramètres suivants :"
echo "URL : $url"
echo "Durée : $DURATION"
echo "Taux : $RATE requêtes/s"

# Fichiers de sortie
RESULTS_FILE="$TEST_DIR/results-$CURRENT_DATE.bin"
PLOT_FILE="$TEST_DIR/plot-$CURRENT_DATE.html"
REPORT_FILE="$TEST_DIR/report-$CURRENT_DATE.txt"

# Exécuter le test
vegeta attack -targets=$TARGET_FILE -duration=$DURATION -rate=$RATE | tee $RESULTS_FILE | vegeta report > $REPORT_FILE

# Générer le rapport graphique HTML
vegeta plot < $RESULTS_FILE > $PLOT_FILE

echo "Test terminé."
echo "Résultats enregistrés dans les fichiers suivants :"
echo " - Rapport binaire : $RESULTS_FILE"
echo " - Rapport texte : $REPORT_FILE"
echo " - Graphique HTML : $PLOT_FILE"
