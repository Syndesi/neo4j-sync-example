Setup:

```bash
cd <projectRoot>
docker-compose up -d
docker exec -it neo4jbundletestintegration_php_1 /bin/sh
# innerhalb von Docker
php bin/console neo4j-sync:index:sync
php bin/console app:populate
```

Dann Neo4j-Dashboard öffnen: [http://localhost:7474/](http://localhost:7474/). Im Textfeld oben dann folgenden Text
eingeben und rechts auf run klicken: 

```cypher
MATCH (n)
MATCH (o)-[r]->(p) RETURN n,o,p,r
```

Es sollten nun Graphen/Nodes mit ihren Verbindungen angezeigt werden.
