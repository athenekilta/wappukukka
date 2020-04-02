# wappukukka

## Uusi vuosi, uudet kujeet
Kopio edellisen vuoden kansio ja nimeä se kuluvalla vuodella. Nyt tilanteen pitäisi olla se, että php tunnistaa vuoden kansion nimestä, ja julkaisun pitäisi siis tapahtua 1.4. klo 0.00 (kunhan tiedostot siirtää palvelimelle). Tässä kohtaa voi olla hyvä idea poistaa viime vuoden luukkutiedot uudesta kansiosta luukut/*.html sekä css/luukut/*.css.

## Etusivun kustomointi
Muokkaa etusivu.php-tiedostoa. Älä poista php-tagia, joka generoi luukkulinkit. Luukkujen sijaintia voi konfiguroida css/luukkulinkit.css -tiedostossa.

## Luukkujen tallentaminen
Php-härpäke osaa automaattisesti hakea luukut/[päivä].html -tiedoston ja näyttää sen käyttäjälle, kun aika on. Lisäksi muotoilua varten voi lisätä tiedoston css/luukut/[päivä].css. Päivä on siis yksinkertaisesti päivän numero, esim 2. Html sisällytetään article-tagin sisälle, eli oleellista on huomata, ettei pidä kirjoittaa esim. head-osuutta tai muitakaan html:n "normitageja", koska ne tulevat mukaan automaattisesti.

