-- Adminer 4.3.1 PostgreSQL dump

\connect "basic";

DROP TABLE IF EXISTS "todo_items";
CREATE SEQUENCE todo_items_iid_seq INCREMENT 1 MINVALUE 1 MAXVALUE 9223372036854775807 START 1 CACHE 1;

CREATE TABLE "public"."todo_items" (
    "todo_list_id" integer NOT NULL,
    "content" character varying(200),
    "created_at" timestamp NOT NULL,
    "updated_at" timestamp NOT NULL,
    "completed_at" timestamp,
    "iid" integer DEFAULT nextval('todo_items_iid_seq') NOT NULL,
    CONSTRAINT "todo_items_iid" PRIMARY KEY ("iid")
) WITH (oids = false);

INSERT INTO "todo_items" ("todo_list_id", "content", "created_at", "updated_at", "completed_at", "iid") VALUES
(1,	'Terminar la fucking Charla',	'2017-08-28 18:49:17.92785',	'2017-08-28 18:49:17.92785',	NULL,	1);

DROP TABLE IF EXISTS "todo_lists";
CREATE SEQUENCE todo_lists_lid_seq INCREMENT 1 MINVALUE 1 MAXVALUE 9223372036854775807 START 1 CACHE 1;

CREATE TABLE "public"."todo_lists" (
    "title" character varying(50) NOT NULL,
    "description" character varying(200) NOT NULL,
    "created_at" timestamp,
    "updated_at" timestamp,
    "lid" integer DEFAULT nextval('todo_lists_lid_seq') NOT NULL,
    CONSTRAINT "todo_lists_lid" PRIMARY KEY ("lid")
) WITH (oids = false);

INSERT INTO "todo_lists" ("title", "description", "created_at", "updated_at", "lid") VALUES
('Pendientes',	'Lista de Pendientes',	'2017-08-28 18:39:00.156237',	'2017-08-28 18:39:00.156237',	1),
('Trabajo',	'Lista de cosas para el trabajo',	'2017-08-28 18:39:23.401882',	'2017-08-28 18:39:23.401882',	2);

DROP TABLE IF EXISTS "migration";
CREATE TABLE "public"."migration" (
    "version" character varying(180) NOT NULL,
    "apply_time" integer,
    CONSTRAINT "migration_pkey" PRIMARY KEY ("version")
) WITH (oids = false);

INSERT INTO "migration" ("version", "apply_time") VALUES
('m000000_000000_base',	1502756648),
('m140209_132017_init',	1502756655),
('m140403_174025_create_account_table',	1502756655),
('m140504_113157_update_tables',	1502756655),
('m140504_130429_create_token_table',	1502756655),
('m140830_171933_fix_ip_field',	1502756655),
('m140830_172703_change_account_table_name',	1502756655),
('m141222_110026_update_ip_field',	1502756656),
('m141222_135246_alter_username_length',	1502756656),
('m150614_103145_update_social_account_table',	1502756656),
('m150623_212711_fix_username_notnull',	1502756656),
('m151218_234654_add_timezone_to_profile',	1502756656),
('m160929_103127_add_last_login_at_to_user_table',	1502756656);

DROP TABLE IF EXISTS "user";
CREATE SEQUENCE user_id_seq INCREMENT 1 MINVALUE 1 MAXVALUE 9223372036854775807 START 1 CACHE 1;

CREATE TABLE "public"."user" (
    "id" integer DEFAULT nextval('user_id_seq') NOT NULL,
    "username" character varying(25) NOT NULL,
    "email" character varying(255) NOT NULL,
    "password_hash" character varying(60) NOT NULL,
    "auth_key" character varying(32) NOT NULL,
    "confirmed_at" integer,
    "unconfirmed_email" character varying(255) DEFAULT NULL,
    "blocked_at" integer,
    "registration_ip" character varying(45),
    "created_at" integer NOT NULL,
    "updated_at" integer NOT NULL,
    "flags" integer DEFAULT 0 NOT NULL,
    "last_login_at" integer,
    CONSTRAINT "user_pkey" PRIMARY KEY ("id"),
    CONSTRAINT "user_unique_email" UNIQUE ("email"),
    CONSTRAINT "user_unique_username" UNIQUE ("username")
) WITH (oids = false);


DROP TABLE IF EXISTS "profile";
CREATE TABLE "public"."profile" (
    "user_id" integer NOT NULL,
    "name" character varying(255) DEFAULT NULL,
    "public_email" character varying(255) DEFAULT NULL,
    "gravatar_email" character varying(255) DEFAULT NULL,
    "gravatar_id" character varying(32) DEFAULT NULL,
    "location" character varying(255) DEFAULT NULL,
    "website" character varying(255) DEFAULT NULL,
    "bio" text,
    "timezone" character varying(40) DEFAULT NULL,
    CONSTRAINT "profile_pkey" PRIMARY KEY ("user_id"),
    CONSTRAINT "fk_user_profile" FOREIGN KEY (user_id) REFERENCES "user"(id) ON UPDATE RESTRICT ON DELETE CASCADE NOT DEFERRABLE
) WITH (oids = false);


DROP TABLE IF EXISTS "social_account";
CREATE SEQUENCE account_id_seq INCREMENT 1 MINVALUE 1 MAXVALUE 9223372036854775807 START 1 CACHE 1;

CREATE TABLE "public"."social_account" (
    "id" integer DEFAULT nextval('account_id_seq') NOT NULL,
    "user_id" integer,
    "provider" character varying(255) NOT NULL,
    "client_id" character varying(255) NOT NULL,
    "data" text,
    "code" character varying(32) DEFAULT NULL,
    "created_at" integer,
    "email" character varying(255) DEFAULT NULL,
    "username" character varying(255) DEFAULT NULL,
    CONSTRAINT "account_pkey" PRIMARY KEY ("id"),
    CONSTRAINT "account_unique" UNIQUE ("provider", "client_id"),
    CONSTRAINT "account_unique_code" UNIQUE ("code"),
    CONSTRAINT "fk_user_account" FOREIGN KEY (user_id) REFERENCES "user"(id) ON UPDATE RESTRICT ON DELETE CASCADE NOT DEFERRABLE
) WITH (oids = false);


DROP TABLE IF EXISTS "token";
CREATE TABLE "public"."token" (
    "user_id" integer NOT NULL,
    "code" character varying(32) NOT NULL,
    "created_at" integer NOT NULL,
    "type" smallint NOT NULL,
    CONSTRAINT "token_unique" UNIQUE ("user_id", "code", "type"),
    CONSTRAINT "fk_user_token" FOREIGN KEY (user_id) REFERENCES "user"(id) ON UPDATE RESTRICT ON DELETE CASCADE NOT DEFERRABLE
) WITH (oids = false);


-- 2017-08-31 13:07:19.863273-03
