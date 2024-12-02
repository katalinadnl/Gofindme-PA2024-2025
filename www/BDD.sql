DROP TABLE IF EXISTS "{prefix}_media";
DROP SEQUENCE IF EXISTS {prefix}_media_id_seq;
CREATE SEQUENCE {prefix}_media_id_seq INCREMENT 1 MINVALUE 1 MAXVALUE 2147483647 CACHE 1;

CREATE TABLE "public"."{prefix}_media" (
    "id" integer DEFAULT nextval('{prefix}_media_id_seq') NOT NULL,
    "title" character varying(15) NOT NULL,
    "filepath" character varying(100) NOT NULL,
    "description" character varying(255) NOT NULL,
    "createdat" timestamp DEFAULT CURRENT_TIMESTAMP NOT NULL,
    CONSTRAINT "{prefix}_media_pkey" UNIQUE ("id")
) WITH (oids = false);

DROP TABLE IF EXISTS "{prefix}_post";
DROP SEQUENCE IF EXISTS {prefix}_post_id_seq;
CREATE SEQUENCE {prefix}_post_id_seq INCREMENT 1 MINVALUE 1 MAXVALUE 2147483647 CACHE 1;

CREATE TABLE "public"."{prefix}_post" (
    "id" integer DEFAULT nextval('{prefix}_post_id_seq') NOT NULL,
    "title" character varying(40) NOT NULL,
    "body" text NOT NULL,
    "type" character varying(40) NOT NULL,
    "slug" character varying(20) NOT NULL,
    "published" smallint DEFAULT '0' NOT NULL,
    "isdeleted" smallint DEFAULT '0' NOT NULL,
    "createdat" timestamp DEFAULT CURRENT_TIMESTAMP NOT NULL,
    "updatedat" timestamp DEFAULT CURRENT_TIMESTAMP,
    "user_username" character varying(25),
    CONSTRAINT "{prefix}_post_pkey" UNIQUE ("id")
) WITH (oids = false);

CREATE INDEX "{prefix}_post_user_id" ON "public"."{prefix}_post" USING btree ("user_username");


DROP TABLE IF EXISTS "{prefix}_sitesetting";
DROP SEQUENCE IF EXISTS {prefix}_sitesetting_id_seq;
CREATE SEQUENCE {prefix}_sitesetting_id_seq INCREMENT 1 MINVALUE 1 MAXVALUE 32767 CACHE 1;

CREATE TABLE "public"."{prefix}_sitesetting" (
    "clé" character varying(45) NOT NULL,
    "valeur" character varying(255) NOT NULL,
    "createdat" timestamp DEFAULT CURRENT_TIMESTAMP NOT NULL,
    "updatedat" timestamp DEFAULT CURRENT_TIMESTAMP,
    "isDeleted" smallint DEFAULT '0' NOT NULL,
    "id" smallint DEFAULT nextval('{prefix}_sitesetting_id_seq') NOT NULL,
    CONSTRAINT "{prefix}_sitesetting_id" UNIQUE ("id"),
    CONSTRAINT "{prefix}_sitesetting_pkey" PRIMARY KEY ("id")
) WITH (oids = false);


DROP TABLE IF EXISTS "{prefix}_theme";
DROP SEQUENCE IF EXISTS {prefix}_theme_id_seq;
CREATE SEQUENCE {prefix}_theme_id_seq INCREMENT 1 MINVALUE 1 MAXVALUE 2147483647 CACHE 1;

CREATE TABLE "public"."{prefix}_theme" (
    "id" integer DEFAULT nextval('{prefix}_theme_id_seq') NOT NULL,
    "titre" character varying(255) NOT NULL,
    "actif" smallint DEFAULT '0' NOT NULL,
    CONSTRAINT "{prefix}_theme_pkey" PRIMARY KEY ("id")
) WITH (oids = false);


DROP TABLE IF EXISTS "{prefix}_user";
DROP SEQUENCE IF EXISTS {prefix}_user_id_seq;
CREATE SEQUENCE {prefix}_user_id_seq INCREMENT 1 MINVALUE 1 MAXVALUE 2147483647 CACHE 1;

CREATE TABLE "public"."{prefix}_user" (
    "id" integer DEFAULT nextval('{prefix}_user_id_seq') NOT NULL,
    "firstname" character varying(25) NOT NULL,
    "lastname" character varying(50) NOT NULL,
    "email" character varying(320) NOT NULL,
    "username" character varying(25) NOT NULL,
    "pwd" character varying(255) NOT NULL,
    "status" smallint DEFAULT '0' NOT NULL,
    "img_path" character varying(255),
    "role" character varying(15) DEFAULT 'user',
    "reset_token" character varying(255),
    "reset_expires" timestamp,
    "createdat" timestamp DEFAULT CURRENT_TIMESTAMP NOT NULL,
    "updatedat" timestamp DEFAULT CURRENT_TIMESTAMP,
    "activation_token" character varying(255),
    "is_active" boolean DEFAULT false,
    CONSTRAINT "{prefix}_user_email_key" UNIQUE ("email"),
    CONSTRAINT "{prefix}_user_pkey" UNIQUE ("id"),
    CONSTRAINT "{prefix}_user_username" UNIQUE ("username")
) WITH (oids = false);

ALTER TABLE ONLY "public"."{prefix}_post" ADD CONSTRAINT "{prefix}_post_user_username_fkey" FOREIGN KEY (user_username) REFERENCES {prefix}_user(username) ON UPDATE CASCADE NOT DEFERRABLE;

INSERT INTO public.gfm_theme (id, titre, actif) VALUES (1, 'music-template', '0');
INSERT INTO public.gfm_theme (id, titre, actif) VALUES (2, 'boulangerie-template', '1');