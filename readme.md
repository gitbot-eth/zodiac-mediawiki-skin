## Development environment setup

1. `git clone --depth=1 https://gerrit.wikimedia.org/r/mediawiki/core.git mediawiki`
2. `cd mediawiki`
3. create the .env file with:

```
   MW_SCRIPT_PATH=/w
   MW_SERVER=http://localhost:8080
   MW_DOCKER_PORT=8080
   MEDIAWIKI_USER=Admin
   MEDIAWIKI_PASSWORD=dockerpass
   XDEBUG_CONFIG=
   XDEBUG_ENABLE=true
   XHPROF_ENABLE=true
```

4. `echo "MW_DOCKER_UID=$(id -u) MW_DOCKER_GID=$(id -g)" >> .env`
5. `docker-compose up -d`
6. `docker-compose exec mediawiki composer update`
7. `docker-compose exec mediawiki /bin/bash /docker/install.sh`
8. open "localhost:8080"
9. `cd skins/`
10. `git clone https://github.com/gitbot-eth/zodiac-wikimedia-skin.git zodiac`
11. open LocalSettings.php (at the root of the mediawiki directory)
12. add `wfLoadSkin( 'zodiac' );` to the LocalSettings.php file, above the `$wgDefaultSkin` variable.
13. set `$wgDefaultSkin = "zodiac";`
14. save the file
15. refresh "localhost:8080"
16. when developing, open the zodiac project directly (for instance via: `cd skins/zodiac` then `code .`)

**In the skin/zodiac folder run:**

17. `npm install`
18. make your changes
19. `npm dev` (or `npm run watch`)
