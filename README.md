## Instal·lació
### Clonar el repositori

```
$ git clone https://github.com/rogerforner/tinkeringLaravel.git
```

### Instal·lar dependències

```
$ composer install
```

## Configuració
### .env

Copiem el fitxer *.env.example* i, a la còpia, li posem el nom *.env*.

Desprès hem de configurar la connexió a la base de dades:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=EL_NOM_DE_LA_BASE_DE_DADES
DB_USERNAME=USUARI_PER_ACCEDIR_A_LA_DB
DB_PASSWORD=CLAU_USUARI
```

Per exemple:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=botiga
DB_USERNAME=root
DB_PASSWORD=root
```

_Farem el mateix amb la resta de paràmetres._

### Migracions
Ara executarem la següent comanda en el terminal per tal de crear les taules a la
base de dades:

```
$ php artisan migrate
```

Si són necessàries dades de prova, executar, també, la següent comanda:

```
$ php artisan migrate:fresh --seed
```

### Generar clau de l'Alpicació

```
$ php artisan key:generate
```

## Engegar el servidor

```
$ php artisan serve
```

Un cop executat el servidor de *artisan* obtindrem una URL en la que navegar a
través de la nostra aplicació web.

```
$ php artisan serve
Laravel development server started: <http://127.0.0.1:8000>
```

*És interessant no tancar aquest mentre es navegi pel lloc web.*
