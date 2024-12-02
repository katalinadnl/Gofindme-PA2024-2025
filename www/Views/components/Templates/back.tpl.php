<?php namespace App\Controllers; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Template Back</title>
    <link rel="stylesheet" type="text/css" href="/Views/styles/dist/css/main.css">
    <script src="/Views/styles/dist/js/main.js"></script>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha384-g6R+2qH1I8hzl6fXExdSN3R/xkA6r0/KRXC5WAPtzIiq/T6NoD2efpZ/KisK/AJUp" crossorigin="anonymous">

    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>


    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<header id="header" class="back-office-header">
    <svg xmlns="http://www.w3.org/2000/svg" width="50" viewBox="0 0 375 375" height="50" version="1.0"><defs><clipPath id="a"><path d="M90 55h195v259.441H90Zm0 0"/></clipPath><clipPath id="b"><path d="M77.023 58.496H298v258H77.023Zm0 0"/></clipPath><clipPath id="c"><path d="M196.703 127.656h-18.41v-18.414h18.41Zm-9.207 18.41a7.183 7.183 0 0 0 6.977-5.445l.937-3.758h-15.828l.941 3.762a7.176 7.176 0 0 0 6.973 5.441Zm-18.41-36.824h-10.492l-6.137 18.414h16.629Zm-9.207 36.824a7.175 7.175 0 0 0 6.973-5.445l.941-3.758h-15.828l.941 3.762a7.176 7.176 0 0 0 6.973 5.441Zm56.523-36.824H205.91v18.414h16.63Zm23.489 18.414-9.207-18.414h-4.579l6.137 18.414Zm-31.75 12.969a7.184 7.184 0 0 0 6.976 5.441 7.175 7.175 0 0 0 6.973-5.445l.941-3.758h-15.828Zm28.382 3.055a3.147 3.147 0 0 0 3.059 2.386 3.155 3.155 0 0 0 3.152-3.148v-6.055h-7.914Zm-87.632-34.438h-4.578l-9.208 18.414h7.649Zm119.074 176.965c-14.328-2.867-31.856-4.863-50.985-5.875-14.714 17.781-25.96 29.813-26.125 29.988a4.593 4.593 0 0 1-6.715 0c-1.304-1.39-12.16-13.035-26.199-29.992-19.101 1.016-36.597 3.016-50.91 5.879-28.242 5.648-30.008 11.703-30.008 11.762 0 .054 1.766 6.11 30.004 11.758 21.45 4.293 50.028 6.652 80.47 6.652 30.444 0 59.023-2.36 80.468-6.652 28.242-5.649 30.004-11.704 30.004-11.758 0-.059-1.762-6.114-30.004-11.762ZM132.262 142.918a3.155 3.155 0 0 0 3.152 3.148c1.45 0 2.703-.98 3.055-2.386l1.707-6.817h-7.914Zm55.234 81.402c-40.61 0-73.648-33.039-73.648-73.648 0-40.613 33.039-73.649 73.648-73.649 40.613 0 73.649 33.036 73.649 73.649 0 40.61-33.036 73.648-73.649 73.648Zm-44.879-23.015h89.758c5.71 0 10.36-4.649 10.36-10.36v-36.093c5.288-1.399 9.206-6.211 9.206-11.934v-10.66a4.6 4.6 0 0 0-.488-2.059l-13.808-27.617a4.607 4.607 0 0 0-4.118-2.543H141.47c-1.746 0-3.34.984-4.117 2.543l-13.809 27.617a4.6 4.6 0 0 0-.488 2.059v10.66c0 5.723 3.918 10.535 9.207 11.934v36.093c0 5.711 4.644 10.36 10.355 10.36Zm.242 44.886c-31.023-41.66-47.422-74.691-47.422-95.52 0-50.76 41.297-92.062 92.06-92.062 50.76 0 92.062 41.301 92.062 92.063 0 45.441-75.13 130.984-92.063 149.687-7.445-8.207-26.129-29.312-44.637-54.168Zm44.637-12.668c45.688 0 82.856-37.168 82.856-82.851 0-45.688-37.168-82.856-82.856-82.856-45.684 0-82.851 37.168-82.851 82.856 0 45.683 37.168 82.851 82.851 82.851Zm-9.203-41.425v-23.016a4.603 4.603 0 0 0-4.606-4.602h-23.015a4.602 4.602 0 0 0-4.602 4.602v23.016h-3.453a1.151 1.151 0 0 1-1.148-1.153v-37.257a12.333 12.333 0 0 0 5.035-5.317 16.38 16.38 0 0 0 13.375 6.902c5.719 0 10.86-2.937 13.809-7.546a16.374 16.374 0 0 0 13.808 7.546 16.364 16.364 0 0 0 13.809-7.546 16.376 16.376 0 0 0 13.812 7.546 16.37 16.37 0 0 0 13.375-6.902 12.333 12.333 0 0 0 5.035 5.316v37.258c0 .637-.515 1.153-1.152 1.153Zm9.203-13.809a4.603 4.603 0 0 0 4.606 4.602h32.218a4.603 4.603 0 0 0 4.606-4.602V164.48a4.606 4.606 0 0 0-4.606-4.605h-32.218a4.606 4.606 0 0 0-4.606 4.605Zm32.223-9.207h-23.016v4.606h23.016Zm-64.442 23.016h13.809v-18.41h-13.809Zm0 0"/></clipPath><linearGradient x1="71.615" gradientTransform="matrix(.57538 0 0 .57538 40.2 40.198)" y1="487.615" x2="487.615" gradientUnits="userSpaceOnUse" y2="71.615" id="d"><stop stop-color="#A8E141" offset="0"/><stop stop-color="#A8E141" offset=".031"/><stop stop-color="#A8E141" offset=".039"/><stop stop-color="#A7DF43" offset=".043"/><stop stop-color="#A6DE44" offset=".047"/><stop stop-color="#A5DD46" offset=".051"/><stop stop-color="#A4DC47" offset=".055"/><stop stop-color="#A3DB49" offset=".059"/><stop stop-color="#A2DA4A" offset=".063"/><stop stop-color="#A1D94C" offset=".066"/><stop stop-color="#A0D84D" offset=".07"/><stop stop-color="#9FD74F" offset=".074"/><stop stop-color="#9ED650" offset=".078"/><stop stop-color="#9DD551" offset=".082"/><stop stop-color="#9DD453" offset=".086"/><stop stop-color="#9CD254" offset=".09"/><stop stop-color="#9BD156" offset=".094"/><stop stop-color="#9AD057" offset=".098"/><stop stop-color="#99CF59" offset=".102"/><stop stop-color="#98CE5A" offset=".105"/><stop stop-color="#97CD5C" offset=".109"/><stop stop-color="#96CC5D" offset=".113"/><stop stop-color="#95CB5E" offset=".117"/><stop stop-color="#94CA60" offset=".121"/><stop stop-color="#93C961" offset=".125"/><stop stop-color="#92C863" offset=".129"/><stop stop-color="#91C764" offset=".133"/><stop stop-color="#90C566" offset=".137"/><stop stop-color="#90C467" offset=".141"/><stop stop-color="#8FC369" offset=".145"/><stop stop-color="#8EC26A" offset=".148"/><stop stop-color="#8DC16B" offset=".152"/><stop stop-color="#8CC06D" offset=".156"/><stop stop-color="#8BBF6E" offset=".16"/><stop stop-color="#8ABE70" offset=".164"/><stop stop-color="#89BD71" offset=".168"/><stop stop-color="#88BC73" offset=".172"/><stop stop-color="#87BB74" offset=".176"/><stop stop-color="#86BA76" offset=".18"/><stop stop-color="#85B877" offset=".184"/><stop stop-color="#84B778" offset=".188"/><stop stop-color="#83B67A" offset=".191"/><stop stop-color="#82B57B" offset=".195"/><stop stop-color="#82B47D" offset=".199"/><stop stop-color="#81B37E" offset=".203"/><stop stop-color="#80B280" offset=".207"/><stop stop-color="#7FB181" offset=".211"/><stop stop-color="#7EB083" offset=".215"/><stop stop-color="#7DAF84" offset=".219"/><stop stop-color="#7CAE85" offset=".223"/><stop stop-color="#7BAD87" offset=".227"/><stop stop-color="#7AAB88" offset=".23"/><stop stop-color="#79AA8A" offset=".234"/><stop stop-color="#78A98B" offset=".238"/><stop stop-color="#77A88D" offset=".242"/><stop stop-color="#76A78E" offset=".246"/><stop stop-color="#75A690" offset=".25"/><stop stop-color="#75A591" offset=".254"/><stop stop-color="#74A492" offset=".258"/><stop stop-color="#73A394" offset=".262"/><stop stop-color="#72A295" offset=".266"/><stop stop-color="#71A197" offset=".27"/><stop stop-color="#70A098" offset=".273"/><stop stop-color="#6F9E9A" offset=".277"/><stop stop-color="#6E9D9B" offset=".281"/><stop stop-color="#6D9C9D" offset=".285"/><stop stop-color="#6C9B9E" offset=".289"/><stop stop-color="#6B9A9F" offset=".293"/><stop stop-color="#6A99A1" offset=".297"/><stop stop-color="#6998A2" offset=".301"/><stop stop-color="#6897A4" offset=".305"/><stop stop-color="#6796A5" offset=".309"/><stop stop-color="#6795A7" offset=".313"/><stop stop-color="#6694A8" offset=".316"/><stop stop-color="#6593AA" offset=".32"/><stop stop-color="#6491AB" offset=".324"/><stop stop-color="#6390AC" offset=".328"/><stop stop-color="#628FAE" offset=".332"/><stop stop-color="#618EAF" offset=".336"/><stop stop-color="#608DB1" offset=".34"/><stop stop-color="#5F8CB2" offset=".344"/><stop stop-color="#5E8BB4" offset=".348"/><stop stop-color="#5D8AB5" offset=".352"/><stop stop-color="#5C89B7" offset=".355"/><stop stop-color="#5B88B8" offset=".359"/><stop stop-color="#5A87B9" offset=".363"/><stop stop-color="#5A86BB" offset=".367"/><stop stop-color="#5984BC" offset=".371"/><stop stop-color="#5883BE" offset=".375"/><stop stop-color="#5782BF" offset=".379"/><stop stop-color="#5681C1" offset=".383"/><stop stop-color="#5580C2" offset=".387"/><stop stop-color="#547FC4" offset=".391"/><stop stop-color="#537EC5" offset=".395"/><stop stop-color="#527DC6" offset=".398"/><stop stop-color="#517CC8" offset=".402"/><stop stop-color="#507BC9" offset=".406"/><stop stop-color="#4F7ACB" offset=".41"/><stop stop-color="#4E79CC" offset=".414"/><stop stop-color="#4D77CE" offset=".418"/><stop stop-color="#4C76CF" offset=".422"/><stop stop-color="#4C75D1" offset=".426"/><stop stop-color="#4B74D2" offset=".43"/><stop stop-color="#4A73D3" offset=".434"/><stop stop-color="#4972D5" offset=".438"/><stop stop-color="#4871D6" offset=".441"/><stop stop-color="#4770D8" offset=".445"/><stop stop-color="#466FD9" offset=".449"/><stop stop-color="#456EDB" offset=".453"/><stop stop-color="#446DDC" offset=".457"/><stop stop-color="#436CDE" offset=".461"/><stop stop-color="#426ADF" offset=".465"/><stop stop-color="#4169E0" offset=".469"/><stop stop-color="#426ADF" offset=".473"/><stop stop-color="#436BDE" offset=".477"/><stop stop-color="#446CDC" offset=".48"/><stop stop-color="#456EDB" offset=".484"/><stop stop-color="#466FD9" offset=".488"/><stop stop-color="#4770D8" offset=".492"/><stop stop-color="#4871D6" offset=".496"/><stop stop-color="#4973D4" offset=".5"/><stop stop-color="#4A74D3" offset=".504"/><stop stop-color="#4B75D1" offset=".508"/><stop stop-color="#4C76CF" offset=".512"/><stop stop-color="#4D77CE" offset=".516"/><stop stop-color="#4E79CC" offset=".52"/><stop stop-color="#507ACA" offset=".523"/><stop stop-color="#517BC9" offset=".527"/><stop stop-color="#527CC7" offset=".531"/><stop stop-color="#537EC5" offset=".535"/><stop stop-color="#547FC4" offset=".539"/><stop stop-color="#5580C2" offset=".543"/><stop stop-color="#5681C0" offset=".547"/><stop stop-color="#5783BF" offset=".551"/><stop stop-color="#5884BD" offset=".555"/><stop stop-color="#5985BC" offset=".559"/><stop stop-color="#5A86BA" offset=".563"/><stop stop-color="#5B88B8" offset=".566"/><stop stop-color="#5C89B7" offset=".57"/><stop stop-color="#5D8AB5" offset=".574"/><stop stop-color="#5E8BB3" offset=".578"/><stop stop-color="#5F8DB2" offset=".582"/><stop stop-color="#618EB0" offset=".586"/><stop stop-color="#628FAE" offset=".59"/><stop stop-color="#6390AD" offset=".594"/><stop stop-color="#6491AB" offset=".598"/><stop stop-color="#6593A9" offset=".602"/><stop stop-color="#6694A8" offset=".605"/><stop stop-color="#6795A6" offset=".609"/><stop stop-color="#6896A4" offset=".613"/><stop stop-color="#6998A3" offset=".617"/><stop stop-color="#6A99A1" offset=".621"/><stop stop-color="#6B9A9F" offset=".625"/><stop stop-color="#6C9B9E" offset=".629"/><stop stop-color="#6D9D9C" offset=".633"/><stop stop-color="#6E9E9B" offset=".637"/><stop stop-color="#6F9F99" offset=".641"/><stop stop-color="#70A097" offset=".645"/><stop stop-color="#72A296" offset=".648"/><stop stop-color="#73A394" offset=".652"/><stop stop-color="#74A492" offset=".656"/><stop stop-color="#75A591" offset=".66"/><stop stop-color="#76A68F" offset=".664"/><stop stop-color="#77A88D" offset=".668"/><stop stop-color="#78A98C" offset=".672"/><stop stop-color="#79AA8A" offset=".676"/><stop stop-color="#7AAB88" offset=".68"/><stop stop-color="#7BAD87" offset=".684"/><stop stop-color="#7CAE85" offset=".688"/><stop stop-color="#7DAF83" offset=".691"/><stop stop-color="#7EB082" offset=".695"/><stop stop-color="#7FB280" offset=".699"/><stop stop-color="#80B37F" offset=".703"/><stop stop-color="#81B47D" offset=".707"/><stop stop-color="#83B57B" offset=".711"/><stop stop-color="#84B77A" offset=".715"/><stop stop-color="#85B878" offset=".719"/><stop stop-color="#86B976" offset=".723"/><stop stop-color="#87BA75" offset=".727"/><stop stop-color="#88BB73" offset=".73"/><stop stop-color="#89BD71" offset=".734"/><stop stop-color="#8ABE70" offset=".738"/><stop stop-color="#8BBF6E" offset=".742"/><stop stop-color="#8CC06C" offset=".746"/><stop stop-color="#8DC26B" offset=".75"/><stop stop-color="#8EC369" offset=".754"/><stop stop-color="#8FC467" offset=".758"/><stop stop-color="#90C566" offset=".762"/><stop stop-color="#91C764" offset=".766"/><stop stop-color="#92C862" offset=".77"/><stop stop-color="#94C961" offset=".773"/><stop stop-color="#95CA5F" offset=".777"/><stop stop-color="#96CC5E" offset=".781"/><stop stop-color="#97CD5C" offset=".785"/><stop stop-color="#98CE5A" offset=".789"/><stop stop-color="#99CF59" offset=".793"/><stop stop-color="#9AD057" offset=".797"/><stop stop-color="#9BD255" offset=".801"/><stop stop-color="#9CD354" offset=".805"/><stop stop-color="#9DD452" offset=".809"/><stop stop-color="#9ED550" offset=".813"/><stop stop-color="#9FD74F" offset=".816"/><stop stop-color="#A0D84D" offset=".82"/><stop stop-color="#A1D94B" offset=".824"/><stop stop-color="#A2DA4A" offset=".828"/><stop stop-color="#A3DC48" offset=".832"/><stop stop-color="#A5DD46" offset=".836"/><stop stop-color="#A6DE45" offset=".84"/><stop stop-color="#A7DF43" offset=".844"/><stop stop-color="#A7E042" offset=".848"/><stop stop-color="#A8E141" offset=".852"/><stop stop-color="#A8E141" offset=".859"/><stop stop-color="#A8E141" offset=".875"/><stop stop-color="#A8E141" offset="1"/></linearGradient></defs><g clip-path="url(#a)"><path fill="#fff" d="m187.59 323.434-79.8-115.782c-30.372-44.07-19.263-104.41 24.804-134.78 44.07-30.372 104.41-19.263 134.781 24.804 23.426 33.996 22.035 77.844 0 109.976Zm0 0"/></g><g clip-path="url(#b)"><g clip-path="url(#c)"><path fill="url(#d)" d="M77.023 58.61v257.769H297.97V58.609Zm0 0"/></g></g></svg>
    <p>GoFindMe</p>
    <div class="profil-button" data-modal-open="modal2">
        <a href="#" class="site-profil-logo">
            <img src="/Views/styles/dist/images/GoFindMe_profil.png" alt="profil">
        </a>
    </div>
    <div class="modal" id="modal2">
        <section>
            <header>
                <h4>Choisir une action</h4>
            </header>
            <?php if(isset($_SESSION['user'])) {
                $userSerialized = $_SESSION['user'];

                $user = unserialize($userSerialized);

            }?>
            <div class="modal_content">
                <h6>Bonjour <?= $user->getFirstname() ?></h6>
                <form id="logout-form" action="/login/logout" method="POST">
                    <button type="submit" name="logout" class="text">Déconnexion</button>
                </form>
                <a href="/bo/user/view-user?id=<?= $user->getId() ?>"><p class="text">Mon profil</p></a>

            </div>
            <footer>
                <button class="button button-primary" data-modal-close>
                    Close
                </button>
            </footer>
        </section>
    </div>
</header>
<div class="back-office-nav-main">
    <nav class="navbar">
        <div class="container">
            <button class="navbar_toggle_button" data-target="#content">
                Menu
            </button>
            <div class="navbar_toggle_content" id="content">
                <ul>
                    <li>
                        <a href="/bo/dashboard" class="accordion">
                            <div class="accordion-title">Tableau de bord</div>
                            <div class="accordion-icon"> </div>
                        </a>
                    </li>
                    <li>
                        <a href="/bo/posts" class="accordion">
                            <div class="accordion-title">Pages</div>
                            <div class="accordion-icon"> </div>
                        </a>
                    </li>
                    <li>
                        <a href="/bo/medias" class="accordion">
                            <div class="accordion-title">Média</div>
                            <div class="accordion-icon"> </div>
                        </a>
                    </li>
                    <li>
                        <a href="/bo/articles" class="accordion">
                            <div class="accordion-title">Articles</div>
                            <div class="accordion-icon"> </div>
                        </a>
                    </li>
                    <li>

                        <a href="/bo/blogs" class="accordion">
                            <div class="accordion-title">Blogs</div>
                            <div class="accordion-icon"> </div>
                        </a>
                    </li>

                    <li>

                        <a href="/bo/themes" class="accordion">
                            <div class="accordion-title">Thèmes</div>
                            <div class="accordion-icon"> </div>
                        </a>
                    </li>
                    <li>
                        <a href="/bo/user" class="accordion">
                            <div class="accordion-title">Utilisateurs</div>
                            <div class="accordion-icon"> </div>
                        </a>
                    </li>
                    <li>
                        <a href="/bo/settings" class="accordion">
                            <div class="accordion-title">Réglages</div>
                            <div class="accordion-icon"> </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <main class="back-office-content">
        <?php include $this->viewName;?>
    </main>
</div>
</body>

</html>
