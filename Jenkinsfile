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
                // pour les tests unitaires seuls: mvn test -Dgroups=Unit -Dtest=!CucumberTest
                // pour les testus unitaires + integration avec mvn test : mvn clean test -Dgroups="Unit,IT" -Dtest=!CucumberTest
                // -DskipTests: tous les tests
                // uniquement les tests d'intégration: mvn clean verify -Dgroups=IT -Dtest=!CucumberTest
                sh '''
                mvn test -Dgroups="Unit,IT" -Dtest=!CucumberTest
                '''
            }
            // après l'exécution
            post {
                // statut du job
                // success / failure / always ...
                // always: car je veux voir les tests en ECHEC !!!
                always {
                    // le rapport surefire depuis la racine de la copie de travail sur le conteneur jenkins
                    junit 'target/surefire-reports/**/*.xml'
                    // parser le rapport de couverture
                    recordCoverage(tools: [[parser: 'JACOCO']],
                        id: 'jacoco', name: 'JaCoCo Coverage',
                        sourceCodeRetention: 'EVERY_BUILD')
                }
            }
        }
    }
}