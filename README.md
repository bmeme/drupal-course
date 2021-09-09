## Overview
This is a base Drupal project intended for course purposes.
The different branches represents different training modules.
The `main` branch contains a Vanilla installation of Drupal 9.2.5.

## How to use
- Clone the repository
- Switch to the branch related to the course module you are interested in
- Install (following the instructions below)
- Enjoy

## Requirements
To run Drupal you need a complete (L)AMP stack. You can meet this requirement
in three ways:
- installing all needed softwares natively on your host (not recommended at all,
but if you really can't do without it, you can find many guides on the internet)
- using a local server PHP environment just like MAMP or XAMPP (acceptable,
follow the instructions of the chosen software)
- using Docker (really recommended!!!)

**This project is docker-ready** then if you are running `docker` and
`docker-compose` on your host, running a

```
$ docker-compose up -d
```

is enough.

If you aren't using docker remember to create a database instance on your
database server before starting installation.

### How to install

### Disclaimer
If you are using Docker, remember to execute the following commands
in a shell into your `app` container. You can open a shell into `app` container typing:

```
$ docker-compose exec app bash
```

### Commands

1. Install `mariadb-client` into the `app` container (needed by install process)

```
# apt-get update && apt-get install -y mariadb-client
```

2. Run composer

```
# composer install --prefer-dist
```

3. Install Drupal from existing configurations

```
# vendor/bin/drush site:install \
  --db-url=mysql://[DB_USER]:[DB_PASS]@[DB_HOST]:[DB_PORT]/[DB_NAME] \
  --account-name=admin \
  --account-name=admin@bmeme.com \
  --site-mail=drupalcourse@bmeme.com \
  --site-name="Drupal Course" \
  --existing-config minimal
```

Remember to substitute:
- `[DB_USER]` with the database granted user
- `[DB_PASS]` with the password chosen for that user
- `[DB_HOST]` with the IP or FQDN of database instance
- `[DB_PORT]` with the port on which your database instance is binding
- `[DB_NAME]` with the database name

If you are using docker, all of these stuff are already defined in
`docker-compose.yml` file.
Here they come:

- `[DB_USER]`: `drupal`
- `[DB_PASS]`: `drupal`
- `[DB_HOST]`: `db`
- `[DB_PORT]`: `3306`
- `[DB_NAME]`: `drupal`

4. Ok, it's done. At the end of the process, you'll be given the `admin` password
with which you can login. Otherwise you can obtain a `one-time-login` URL typing:

```
# vendor/bin/drush uli
```

## Author Information

This project was created in 2021 by [Bmeme](https://www.bmeme.com) for its educational purposes.

