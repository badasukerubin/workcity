# Workcity
This was originally designed to be a student loan management system but can be used generally.

# Requirements
* PHP 5.5.9 >=
* Composer

# Setup
You need to clone the project to create a local copy on your system.
Run the following on your terminal:
```
git clone https://github.com/000kelvin/workcity.git
```
Then change into the project's directory by running the following on your terminal:
```
cd workcity
```
As you already have composer installed, run the following on your terminal:
```
composer install
```
or:
```
composer update
```
# Configurations

After complete setup process you have to configure you database credentials. First copy `.env.example` as `.env`

```shell
cp .env.example .env
```

To generate key please run this:

```
php artisan key:generate
```

Now open `.env` file and write database informations. Then run migrate from you terminal

```shell
php artisan migrate
```

When database migration then you have to run database seed command.

```shell
php artisan db:seed
```

# Running the project
Run the following on your on your terminal:
```
php artisan serve
```
and access the website on your local website with the given url.

