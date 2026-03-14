<?php
// $Id: main.php,v 1.9 2004/07/26 17:51:25 hthouzard Exp $
//%%%%%%		File Name index.php 		%%%%%
define("_NW_PRINTER","Página de impressão amigável");
define("_NW_SENDSTORY","Enviar esta história par aum amigo");
define("_NW_READMORE","Leia mais...");
define("_NW_COMMENTS","Comentários?");
define("_NW_ONECOMMENT","1 comentário");
define("_NW_BYTESMORE","Mais %s bytes");
define("_NW_NUMCOMMENTS","%s comentários");
define("_NW_MORERELEASES", "Mais lançamentos em ");


//%%%%%%		File Name submit.php		%%%%%
define("_NW_SUBMITNEWS","Enviar notícias");
define("_NW_TITLE","Título");
define("_NW_TOPIC","Tópico");
define("_NW_THESCOOP","Texto Introdutório");
define("_NW_NOTIFYPUBLISH","Notificar por e-mail quando publicado");
define("_NW_POST","Publicar");
define("_NW_GO","Ir!");
define("_NW_THANKS","Obrigado por sua participação."); //submission of news article

define("_NW_NOTIFYSBJCT","NOTÍCIAS do meu sítio"); // Notification mail subject
define("_NW_NOTIFYMSG","Olá! Você recebeu um novo envio em seu sítio."); // Notification mail message

//%%%%%%		File Name archive.php		%%%%%
define("_NW_NEWSARCHIVES","Arquivos de Notícias");
define("_NW_ARTICLES","Artigos");
define("_NW_VIEWS","Visualizações");
define("_NW_DATE","Data");
define("_NW_ACTIONS","Ações");
define("_NW_PRINTERFRIENDLY","Página de impressão amigável");

define("_NW_THEREAREINTOTAL","Existem %s artigo(s) no total");

// %s is your site name
define("_NW_INTARTICLE","Artigo interessante em %s");
define("_NW_INTARTFOUND","Eu encontrei um artigo interessante em %s");

define("_NW_TOPICC","Tóopico:");
define("_NW_URL","URL:");
define("_NW_NOSTORY","Desculpe, a história selecionada não existe.");

//%%%%%%	File Name print.php 	%%%%%

define("_NW_URLFORSTORY","O endereço desta história é:");

// %s represents your site name
define("_NW_THISCOMESFROM","Este artigo veio de %s");

// Added by Hervé
define("_NW_ATTACHEDFILES","Arquivos anexados:");
define("_NW_ATTACHEDLIB","Este artigo possui anexos");
define("_NW_NEWSSAMEAUTHORLINK","Notícias do mesmo autor");
define("_NW_NEWS_NO_TOPICS","Desculpe, mas não existe nenhum tópico. Você deve criar um tópico antes de enviar uma notícia.");
define("_NW_PREVIOUS_ARTICLE","Artigo Anterior");
define("_NW_NEXT_ARTICLE","Próximo Artigo");
define("_NW_OTHER_ARTICLES","Outros Artigos");

// Added by Hervé in version 1.3 for rating
define("_NW_RATETHISNEWS","Classifique esta notícia");
define("_NW_RATEIT","Classificar!");
define("_NW_TOTALRATE","Total de Classificações");
define("_NW_RATINGLTOH","Classificação (do menor para o maior)");
define("_NW_RATINGHTOL","Classificação (do maior para o menor)");
define("_NW_RATINGC","Classificação: ");
define("_NW_RATINGSCALE","A escala é de 1 - 10, sendo 1 o pior e 10 o melhor.");
define("_NW_BEOBJECTIVE","Por favor, seja objetivo. Se todo mundo receber um 1 ou um 10, as classificações não serão muito úteis.");
define("_NW_DONOTVOTE","Não voto no seu próprio artigo.");
define("_NW_RATING","Classificação");
define("_NW_VOTE","Votar");
define("_NW_NORATING","Nenhuma classificação selecionada.");
define("_NW_USERAVG","M;edia de Classificação dos usuários");
define("_NW_DLRATINGS","News Rating (total de votos: %s)");
define("_NW_ONEVOTE","1 voto");
define("_NW_NUMVOTES","%u votos");		// Warning
define("_NW_CANTVOTEOWN","Você não pode votar no seu próprio artigo.<br />Todos os votos são registrados e revisados.");
define("_NW_VOTEDELETED","Dados de votação apagados.");
define("_NW_VOTEONCE","Por favor, não vote no mesmo artigo mais de uma vez.");
define("_NW_VOTEAPPRE","Seu voto é importante.");
define("_NW_THANKYOU","Obrigado por sua participação no %s"); // %s is your site name
define("_NW_RSSFEED","RSS");	// Warning, this text is included insided an Alt attribut (for a picture), so take care to the quotes
define("_NW_AUTHOR","Autor");
define("_NW_META_DESCRIPTION","Descrição 'Meta description'");
define("_NW_META_KEYWORDS","Palavras-chave 'Meta keywords'");
define("_NW_MAKEPDF","Criar um arquvo PDF do artigo");
define('_MD_POSTEDON',"Enviado em: ");
define("_NW_AUTHOR_ID","ID do autor");
define("_NW_POST_SORRY","Desculpe, mas ou não existem tópicos criados ou você não tem permissão para publicar notícias em nenhum tópico. Se você é o webmaster, vá até a área de administração e defina as permissões de envio.");

// Added in v 1.50
define("_NW_LINKS","Links");
define("_NW_PAGE","Página");
define("_NW_BOOKMARK_ME","Marcar este artigo como favorito neste site");
define('_AM_NEWS_TOTAL',"Total de %u artigos");
define('_AM_NEWS_WHOS_WHO',"Quem é quem");
define('_NW_NEWS_LIST_OF_AUTHORS',"Aqui está uma lista dos autores deste site, clique no nome para ver os arigos daquele autor");
define('_AM_NEWS_TOPICS_DIRECTORY',"Lista de Tópicos");
define("_NW_PAGE_AUTO_SUMMARY","Página %d : %s");
// Added in version 1.51
define("_NW_BOOKMARK_TO_BLINKLIST","Bookmark to Blinklist");
define("_NW_BOOKMARK_TO_DELICIOUS","Bookmark to del.icio.us");
define("_NW_BOOKMARK_TO_DIGG","Bookmark to Digg");
define("_NW_BOOKMARK_TO_FARK","Bookmark to Fark");
define("_NW_BOOKMARK_TO_FURL","Bookmark to Furl");
define("_NW_BOOKMARK_TO_NEWSVINE","Bookmark to Newsvine");
define("_NW_BOOKMARK_TO_REDDIT","Bookmark to Reddit");
define("_NW_BOOKMARK_TO_SIMPY","Bookmark to Simpy");
define("_NW_BOOKMARK_TO_SPURL","Bookmark to Spurl");
define("_NW_BOOKMARK_TO_YAHOO","Bookmark to Yahoo");
// Added in version 1.56
define('_NW_NOTYETSTORY',"Desculpe, a notícia selecionada ainda não foi publicada. Por favor volte posterior e tente novamente.");
?>