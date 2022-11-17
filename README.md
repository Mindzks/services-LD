Projekto tikslas – sukurti interneto svetainę, kurioje įmonės galėtų matyti kokias paslaugas ir kam suteikė.
<br><br>
Veikimo principas – kuriama platforma susidės iš dviejų dalių: internetinė aplikacija, kuria naudosis įmonių darbuotojai, administratorius, bei aplikacijos programavimo sąsaja (angl. API). Įmonės darbuotojai norėdami naudotis CRM teikiamomis paslaugomis turės prisiregistruoti. Prisijungę prie sistemos jie galės pasirinkti kokios įmonės suteiktas paslaugas nori pamatyti. Pasirinkę konkrečią įmonę jie galės pridėti klientą prie paslaugos, taip patvirtindami faktą, kad klientui paslaugos buvo suteiktos. Administratorius tvirtina registracijas ir klientų pridėjimą prie paslaugos.
<br><br>

Rolės:<br>
Paprastas naudotojas - 0<br>
Darbuotojas - 1<br>
Admin - 2<br>
<br><br>
Klientų blokas:<br>
    Paprastas naudotojas gali: peržiūrėti save, kaip klientą ir atnaujinti savo duomenis.<br>
    Darbuotojas gali: Sukurti klientą<br>
    Admin gali: sukurti ištrinti peržiūrėti atnaujinti<br><br>
Paslaugų blokas<br>
    Paprastas naudotojas gali: peržiūrėti konkrečios kompanijos visas paslaugas, peržiūrėti konkrečios kompanijos vieną paslaugą.<br>
    Darbuotojas gali: Sukurti, atnaujinti, ištrinti paslaugą<br>
    Admin gali: Admin gali atlikti visas paprasto naudotojo ir darbuotojo funckijas.<br><br>
Kompanijų blokas<br>
    Paprastas naudotojas gali: peržiūrėti kompanijas<br>
    Darbuotojas gali: Sukurti, atnaujinti kompanijas<br>
    Admin gali: Admin gali atlikti visas paprasto naudotojo ir darbuotojo funckijas.<br>
    
    
    
    # API

### Companies (įmonės)

#### `GET` api/companies

Gražina visas įmones

#### `GET` api/companies/{id}

Gražina įmonę kuris ID atitinka {id} reikšmę

| Parametras    | Reikalingumas   |
|---------------|-----------------|
| id            | Reikalingas     |

#### `POST` api/companies

Sukuria įmonę

| Parametras    | Reikalingumas |
|---------------|---------------|
| name          | reikalingas   |
| company_code  | reikalingas   |
| type          | reikalingas   |
| email         | reikalingas   |
| city          | reikalingas   |
| postal_code   | reikalingas   |
| address       | reikalingas   |

#### `PUT` api/companies/{id}

Atnaujina pasirinkta įmonę

| Parametras    | Reikalingumas   |
|---------------|-----------------|
| name          | pasirinktinai   |
| company_code  | pasirinktinai   |
| type          | pasirinktinai   |
| email         | pasirinktinai   |
| city          | pasirinktinai   |
| postal_code   | pasirinktinai   |
| address       | pasirinktinai   |

#### `DELETE` /groups/{id}

Ištrina pasirinktą įmonę

| Parametras    | Reikalingumas   |
|---------------|-----------------|
| id            | Reikalingas     |

### Services (paslaugos)

#### `GET` api/companies/{company}/services

Gražina visas paslaugos kurios priklauso {company} id turinčiai įmonei

#### `GET` api/companies/{company}/services/{service}

Gražina vieną paslaugą kuri priklauso {company} ir turi {service} id.

| Parametras    | Reikalingumas   |
|---------------|-----------------|
| company       | Reikalingas     |
| service       | Reikalingas     |

#### `POST` api/companies/{company}/services/

Sukuria paslaugą, kuri priklauso {company} id turinčiai kompanijai

| Parametras    | Reikalingumas   |
|---------------|-----------------|
| company       | Reikalingas     |
| name          | Reikalingas     |
| description   | Reikalingas     |
| price         | Reikalingas     |

#### `PUT` api/companies/{company}/services/{service}

Atnaujina pasirinkta įmonės paslaugą

| Parametras    | Reikalingumas   |
|---------------|-----------------|
| company       | Reikalingas     |
| service       | Reikalingas     |
| name          | nebūtinas       |
| description   | nebūtinas       |
| price         | nebūtinas       |

#### `DELETE` api/companies/{company}/services/{service}

Ištrina pasirinktą įmonės paslaugą

| Parametras    | Reikalingumas   |
|---------------|-----------------|
| company       | Reikalingas     |
| service       | Reikalingas     |


### Customers (klientai)

#### `GET` api/companies/{company}/services/{service}/customers

Gražina visus klientus kurie yra pasinaudoja įmonės konkrečia paslauga.

#### `GET` api/companies/{company}/services/{service}/{service}/customers/{customer}

Gražina vieną klientą kuris yra pasinaudojęs įmonės konkrečia paslauga.

| Parametras    | Reikalingumas   |
|---------------|-----------------|
| company       | Reikalingas     |
| service       | Reikalingas     |
| customer      | Reikalingas     |

#### `POST` api/companies/{company}/services/{service}/customers

Sukuria klientą įmonės {company} paslaugai {service}.

| Parametras    | Reikalingumas   |
|---------------|-----------------|
| company       | Reikalingas     |
| service       | Reikalingas     |
| customer      | Reikalingas     |
| name          | Reikalingas     |
| surname       | Reikalingas     |
| email         | Reikalingas     |
| personal_code | Reikalingas     |
| city          | Reikalingas     |
| street        | Reikalingas     |
| house_number  | Reikalingas     |

#### `PUT` api/companies/{company}/services/{service}/{service}/customers/{customer}

Atnaujina klientą, kuris yra pasinaudojės konkrečios įmonės, konrečia paslauga.

| Parametras    | Reikalingumas     |
|---------------|-------------------|
| company       | pasirinktinai     |
| service       | pasirinktinai     |
| customer      | pasirinktinai     |
| name          | pasirinktinai     |
| surname       | pasirinktinai     |
| email         | pasirinktinai     |
| personal_code | pasirinktinai     |
| city          | pasirinktinai     |
| street        | pasirinktinai     |
| house_number  | pasirinktinai     |

#### `DELETE` api/companies/{company}/services/{service}/{service}/customers/{customer}

Ištrina pasirinktą klientą

| Parametras    | Reikalingumas   |
|---------------|-----------------|
| company       | Reikalingas     |
| service       | Reikalingas     |
| customer      | Reikalingas     |


### Autorizacija

#### `POST` api/login

Prisijungimas gauti JWT

| Parametras     | Reikalingumas |
|----------------|---------------|
| email          | Reikalingas   |
| password       | Reikalingas   |
    
    
