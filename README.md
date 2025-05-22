# DevProfile

Une application web Laravel permettant aux développeurs de créer un profil professionnel, gérer leurs projets et compétences, et générer automatiquement un CV au format PDF.

## Table des matières

- [À propos du projet](#à-propos-du-projet)
- [Fonctionnalités](#fonctionnalités)
- [Technologies utilisées](#technologies-utilisées)
- [Prérequis](#prérequis)
- [Installation](#installation)
- [Configuration](#configuration)
- [Structure du projet](#structure-du-projet)
- [Utilisation](#utilisation)
- [Architecture MVC](#architecture-mvc)
- [Relations de base de données](#relations-de-base-de-données)
- [Problèmes rencontrés et solutions](#problèmes-rencontrés-et-solutions)
- [Tests](#tests)
- [Contribution](#contribution)
- [Licence](#licence)
- [Contact](#contact)

## À propos du projet

DevProfile est une application web développée avec Laravel dans le cadre du module "Développement web avancé" à l'École Supérieure de Technologie de Nador. L'objectif est de permettre aux développeurs de créer facilement un portfolio en ligne professionnel avec génération automatique de CV.

### Contexte académique
- **Module :** Développement web avancé
- **Professeur :** RABHI Ouzayr
- **Filière :** Ingénierie Logicielle et Cybersécurité (ILCS)
- **Année :** 2024/2025, Semestre S2
- **Développeurs :** boudzouaou et ilouafi

## Fonctionnalités

### ✅ Authentification
- Inscription et connexion sécurisées
- Gestion des sessions utilisateur
- Protection des routes sensibles

### ✅ Profil utilisateur
- Modification des informations personnelles
- Ajout d'un titre professionnel et d'une biographie
- Attribution d'un nom d'utilisateur unique
- Profil public accessible via URL personnalisée

### ✅ Gestion des projets
- Création, modification et suppression de projets
- Description détaillée avec liens optionnels
- Affichage sur le profil public

### ✅ Gestion des compétences
- Ajout et suppression de compétences techniques
- Affichage organisé sur le profil

### ✅ Génération de CV
- Création automatique d'un CV au format PDF
- Design professionnel et structuré
- Téléchargement direct depuis le profil public

### ✅ Interface utilisateur
- Design responsive avec Tailwind CSS
- Navigation intuitive
- Messages de feedback utilisateur

## Technologies utilisées

### Backend
- **PHP 8.x** - Langage de programmation principal
- **Laravel 11** - Framework PHP MVC
- **Eloquent ORM** - Gestion des relations de base de données
- **Laravel Breeze** - Système d'authentification
- **MySQL** - Base de données relationnelle

### Frontend
- **Blade** - Moteur de templates Laravel
- **Tailwind CSS** - Framework CSS utilitaire
- **HTML5** - Structure des pages
- **JavaScript** - Interactivité côté client

### Outils et bibliothèques
- **Barryvdh/Laravel-DomPDF** - Génération de PDF
- **Composer** - Gestionnaire de dépendances PHP
- **NPM** - Gestionnaire de dépendances JavaScript
- **Vite** - Outil de build moderne
- **Git** - Contrôle de version

## Prérequis

Avant d'installer le projet, assurez-vous d'avoir :

- PHP >= 8.1
- Composer
- Node.js >= 16.x
- NPM ou Yarn
- MySQL >= 8.0
- Serveur web (Apache/Nginx) ou utilisation d'Artisan serve

## Installation

### 1. Cloner le projet

```bash
git clone https://github.com/votre-username/devprofile.git
cd devprofile
```

### 2. Installer les dépendances PHP

```bash
composer install
```

### 3. Installer les dépendances JavaScript

```bash
npm install
```

### 4. Configuration de l'environnement

```bash
cp .env.example .env
php artisan key:generate
```

### 5. Configurer la base de données

Modifiez le fichier `.env` avec vos paramètres de base de données :

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=devprofile
DB_USERNAME=votre_nom_utilisateur
DB_PASSWORD=votre_mot_de_passe
```

### 6. Créer la base de données

```bash
mysql -u root -p
CREATE DATABASE devprofile;
exit
```

### 7. Exécuter les migrations

```bash
php artisan migrate
```

### 8. (Optionnel) Générer des données de test

```bash
php artisan db:seed
```

### 9. Compiler les assets

```bash
npm run dev
# ou pour la production
npm run build
```

### 10. Démarrer le serveur

```bash
php artisan serve
```

L'application sera accessible à l'adresse : `http://localhost:8000`

## Configuration

### Configuration de DomPDF

Ajoutez les lignes suivantes dans `config/app.php` :

```php
// Dans le tableau 'providers'
'providers' => [
    // ...
    Barryvdh\DomPdf\ServiceProvider::class,
],

// Dans le tableau 'aliases'
'aliases' => [
    // ...
    'PDF' => Barryvdh\DomPdf\Facade::class,
],
```

### Configuration de Tailwind

Le fichier `tailwind.config.js` est configuré pour inclure tous les fichiers Blade :

```javascript
module.exports = {
    content: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        extend: {},
    },
    plugins: [],
}
```

## Structure du projet

```
devprofile/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── DashboardController.php
│   │   │   ├── PDFController.php
│   │   │   ├── ProfileController.php
│   │   │   ├── ProjectController.php
│   │   │   ├── PublicProfileController.php
│   │   │   └── SkillController.php
│   │   ├── Middleware/
│   │   └── Policies/
│   │       ├── ProjectPolicy.php
│   │       └── SkillPolicy.php
│   ├── Models/
│   │   ├── Project.php
│   │   ├── Skill.php
│   │   └── User.php
│   └── ...
├── database/
│   ├── migrations/
│   │   ├── 2014_10_12_000000_create_users_table.php
│   │   ├── 2024_05_20_000000_add_fields_to_users_table.php
│   │   ├── 2024_05_20_000001_create_projects_table.php
│   │   └── 2024_05_20_000002_create_skills_table.php
│   └── seeders/
│       ├── UserSeeder.php
│       ├── ProjectSeeder.php
│       └── SkillSeeder.php
├── resources/
│   ├── views/
│   │   ├── dashboard.blade.php
│   │   ├── pdf/
│   │   │   └── cv.blade.php
│   │   ├── profile/
│   │   │   ├── edit.blade.php
│   │   │   └── show.blade.php
│   │   ├── projects/
│   │   │   ├── create.blade.php
│   │   │   ├── edit.blade.php
│   │   │   └── index.blade.php
│   │   └── skills/
│   │       └── index.blade.php
│   ├── css/
│   │   └── app.css
│   └── js/
│       └── app.js
├── routes/
│   └── web.php
├── .env
├── composer.json
├── package.json
├── tailwind.config.js
└── README.md
```

## Utilisation

### 1. Première connexion

1. Accédez à `http://localhost:8000`
2. Cliquez sur "S'inscrire" pour créer un compte
3. Remplissez le formulaire d'inscription
4. Connectez-vous avec vos identifiants

### 2. Configuration du profil

1. Accédez à "Mon Profil"
2. Complétez vos informations :
   - Titre professionnel
   - Biographie
   - Nom d'utilisateur (obligatoire pour le profil public)

### 3. Ajout de projets

1. Allez dans la section "Projets"
2. Cliquez sur "Ajouter un projet"
3. Remplissez les informations du projet
4. Sauvegardez

### 4. Ajout de compétences

1. Accédez à la section "Compétences"
2. Tapez le nom de la compétence
3. Cliquez sur "Ajouter"

### 5. Consultation du profil public

1. Depuis le tableau de bord, cliquez sur "Voir mon profil public"
2. Votre profil est accessible via l'URL : `/profile/votre-username`

### 6. Génération du CV

1. Depuis votre profil public, cliquez sur "Télécharger mon CV"
2. Le PDF se télécharge automatiquement



- **User** : Représente un utilisateur avec ses informations personnelles
- **Project** : Représente un projet lié à un utilisateur
- **Skill** : Représente une compétence liée à un utilisateur

### Vues (Views)

- Templates Blade pour l'affichage
- Layout principal avec navigation
- Vues spécialisées pour chaque fonctionnalité

### Contrôleurs (Controllers)

- **DashboardController** : Gestion de la page d'accueil
- **ProfileController** : Gestion du profil utilisateur
- **ProjectController** : CRUD des projets
- **SkillController** : CRUD des compétences
- **PublicProfileController** : Affichage des profils publics
- **PDFController** : Génération des CV

## Relations de base de données

### Schéma de la base de données

```sql
users
├── id (PK)
├── name
├── email
├── password
├── title
├── bio
└── username

projects
├── id (PK)
├── user_id (FK → users.id)
├── title
├── description
└── link

skills
├── id (PK)
├── user_id (FK → users.id)
└── name
```

### Relations Eloquent

```php
// User Model
public function projects()
{
    return $this->hasMany(Project::class);
}

public function skills()
{
    return $this->hasMany(Skill::class);
}

// Project Model
public function user()
{
    return $this->belongsTo(User::class);
}

// Skill Model
public function user()
{
    return $this->belongsTo(User::class);
}
```

## Problèmes rencontrés et solutions

### 1. Configuration de DomPDF

**Problème :** Erreur `Class 'PDF' not found` lors de la génération de PDF.

**Solution :** Configuration manuelle dans `config/app.php` :
```php
'providers' => [
    Barryvdh\DomPdf\ServiceProvider::class,
],
'aliases' => [
    'PDF' => Barryvdh\DomPdf\Facade::class,
],
```

### 2. Sécurisation des ressources

**Problème :** Empêcher les utilisateurs de modifier les projets d'autres utilisateurs.

**Solution :** Implémentation de Policies Laravel :
```php
public function update(User $user, Project $project)
{
    return $user->id === $project->user_id;
}
```

### 3. URLs uniques pour les profils

**Problème :** Gestion des noms d'utilisateur uniques.

**Solution :** Validation avec règle unique :
```php
'username' => 'required|string|max:255|unique:users,username,' . Auth::id(),
```

### 4. Optimisation des requêtes

**Problème :** Requêtes N+1 pour charger les projets et compétences.

**Solution :** Utilisation du eager loading :
```php
$user = User::where('username', $username)
    ->with(['projects', 'skills'])
    ->firstOrFail();
```

## Tests

Pour exécuter les tests :

```bash
php artisan test
```

### Tests disponibles

- Tests d'authentification
- Tests des contrôleurs
- Tests des modèles
- Tests de génération PDF

## Données de démonstration

L'application inclut des seeders avec des données de test :

**Compte de démonstration :**
- Email : `john@example.com`
- Mot de passe : `password`

Pour charger les données de démonstration :
```bash
php artisan db:seed
```

## Déploiement

### Environnement de production

1. Configurez les variables d'environnement :
```bash
APP_ENV=production
APP_DEBUG=false
```

2. Optimisez l'application :
```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

3. Compilez les assets :
```bash
npm run build
```

## Sécurité

### Mesures de sécurité implémentées

- Protection CSRF sur tous les formulaires
- Validation des données d'entrée
- Policies pour l'autorisation
- Middleware d'authentification
- Hachage sécurisé des mots de passe

## Performance

### Optimisations implémentées

- Eager loading pour éviter les requêtes N+1
- Cache de configuration en production
- Compilation des assets avec Vite
- Indexation des colonnes de base de données

## Contribution

1. Forkez le projet
2. Créez une branche pour votre fonctionnalité (`git checkout -b feature/nouvelle-fonctionnalite`)
3. Committez vos changements (`git commit -m 'Ajout d'une nouvelle fonctionnalité'`)
4. Poussez vers la branche (`git push origin feature/nouvelle-fonctionnalite`)
5. Ouvrez une Pull Request

### Standards de code

- Respect des standards PSR-12 pour PHP
- Utilisation de noms explicites pour les variables et méthodes
- Commentaires en français pour ce projet académique
- Tests unitaires pour les nouvelles fonctionnalités

## Évolutions futures

### Fonctionnalités envisagées

- [ ] Système de thèmes pour les CV
- [ ] Intégration avec GitHub API
- [ ] Système de recommandations
- [ ] Export en format Word
- [ ] Multi-langues
- [ ] Système de notation des projets
- [ ] Intégration réseaux sociaux

## FAQ

### Comment changer le design du CV ?

Modifiez le template `resources/views/pdf/cv.blade.php` et les styles CSS associés.

### Comment ajouter de nouveaux champs au profil ?

1. Créez une migration : `php artisan make:migration add_field_to_users_table`
2. Modifiez le modèle User
3. Mettez à jour les formulaires et validations

### L'application ne génère pas de PDF

Vérifiez que DomPDF est correctement configuré dans `config/app.php` et que les permissions d'écriture sont accordées au dossier `storage/`.

## Licence

Ce projet est développé dans un cadre académique pour l'École Supérieure de Technologie de Nador.

## Contact

### Développeurs

- **Elmahdi Boudzouaou 
- **Mohamed ilouafi** 

### Encadrement

- **Professeur RABHI Ouzayr** - École Supérieure de Technologie de Nador

### Liens

- **Dépôt GitHub :** (https://github.com/nenzoo/DevProfile.git)
- **Documentation Laravel :** [https://laravel.com/docs](https://laravel.com/docs)
- **EST Nador :** [http://www.estnador.ma](http://www.estnador.ma)

---

**Développé avec ❤️ par les étudiants de l'EST Nador - ILCS 2024/2025**
