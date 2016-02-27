# Generar entidades

* vendor/bin/doctrine orm:convert-mapping --from-database xml config/xml/
* vendor/bin/doctrine orm:generate-entities --generate-annotations=true --regenerate-entities=true src/mapping/