// pipeline = processus = ensemble de tâches coordonnées transformant un vecteur Entrée en un vecteur Sortie
pipeline {
    // agent = exécuteur => controleur jenkins
    agent any
    tools {
        maven 'maven'
        jdk '17'
    }
    // ensemble des tâches
    stages {
        // une tâche
        stage('Test') {
            // étapes d'exécution
            steps {
                // permet d'exécuter des commandes shell
                sh '''
                mvn test -Dgroups=Unit -Dtest=!CucumberTest
                '''
            }
        }
    }
}