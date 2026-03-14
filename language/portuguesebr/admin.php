<?php
// $Id: admin.php,v 1.18 2004/07/26 17:51:25 hthouzard Exp $
//%%%%%%	Admin Module Name  Articles 	%%%%%
define("_AM_DBUPDATED","Base de Dados atualizada com sucesso!");
define("_AM_CONFIG","Configuração de notícias");
define("_AM_AUTOARTICLES","Artigos automatizados");
define("_AM_STORYID","ID da história");
define("_AM_TITLE","Título");
define("_AM_TOPIC","Tópico");
define("_AM_POSTER","Remetente");
define("_AM_PROGRAMMED","Data/Hora programada");
define("_AM_ACTION","Ação");
define("_AM_EDIT","Editar");
define("_AM_DELETE","Apagar");
define("_AM_LAST10ARTS","Últimos %d Artigos");
define("_AM_PUBLISHED","Publicado"); // Published Date
define("_AM_GO","Ir!");
define("_AM_EDITARTICLE","Editar Artigo");
define("_AM_POSTNEWARTICLE","Publicar Novo Artigo");
define("_AM_ARTPUBLISHED","Seu artigo foi publicado!");
define("_AM_HELLO","Olá %s,");
define("_AM_YOURARTPUB","O artigo que você enviou para nosso site acaba de ser publicado.");
define("_AM_TITLEC","Título: ");
define("_AM_URLC","Endereço: ");
define("_AM_PUBLISHEDC","Publicado: ");
define("_AM_RUSUREDEL","Tem certeza de que deseja apagar este artigo e todos os seus comentários?");
define("_AM_YES","Sim");
define("_AM_NO","Não");
define("_AM_INTROTEXT","Texto de Introdução");
define("_AM_EXTEXT","Texto Complementar");
define("_AM_ALLOWEDHTML","Permitir HTML:");
define("_AM_DISAMILEY","Desativar carinhas");
define("_AM_DISHTML","Desativar HTML");
define("_AM_APPROVE","Aprovar");
define("_AM_MOVETOTOP","Mover esta história para o topo");
define("_AM_CHANGEDATETIME","Alterar a data/hora da publicação");
define("_AM_NOWSETTIME","Data/Hora da publicação: %s"); // %s is datetime of publish
define("_AM_CURRENTTIME","Hora atual is: %s");  // %s is the current datetime
define("_AM_SETDATETIME","Definir Data/Hora da publicação");
define("_AM_MONTHC","Mês:");
define("_AM_DAYC","Dia:");
define("_AM_YEARC","Ano:");
define("_AM_TIMEC","Hora:");
define("_AM_PREVIEW","Visualizar");
define("_AM_SAVE","Salvar");
define("_AM_PUBINHOME","Publicar na Página inicial?");
define("_AM_ADD","Adicionar");

//%%%%%%	Admin Module Name  Topics 	%%%%%

define("_AM_ADDMTOPIC","Adicionar um Tópico Principal");
define("_AM_TOPICNAME","Nome do Tópico");
// Warning, changed from 40 to 255 characters.
define("_AM_MAX40CHAR","(Máx: 255 caracteres)");
define("_AM_TOPICIMG","Imagem do Tópico");
define("_AM_IMGNAEXLOC","nome da imagem + extensão localizada em %s");
define("_AM_FEXAMPLE","por exemplo: jogos.gif");
define("_AM_ADDSUBTOPIC","Adicionar um SUB-tópico");
define("_AM_IN","em");
define("_AM_MODIFYTOPIC","Modificar Tópico");
define("_AM_MODIFY","Modificar");
define("_AM_PARENTTOPIC","Tópico relacionado");
define("_AM_SAVECHANGE","Salvar alterações");
define("_AM_DEL","Apagar");
define("_AM_CANCEL","Cancelar");
define("_AM_WAYSYWTDTTAL","ATAENÇÃO: Você tem certeza que deseja apagar este Tópico e TODAS as Histórias e Comentários relacionados??");


// Added in Beta6
define("_AM_TOPICSMNGR","Gerenciador de Tópicos");
define("_AM_PEARTICLES","Publicar/Editar Artigos");
define("_AM_NEWSUB","Novos envios");
define("_AM_POSTED","Publicado");
define("_AM_GENERALCONF","Configuração Geral");

// Added in RC2
define("_AM_TOPICDISPLAY","Mostrar imagem do Tópico?");
define("_AM_TOPICALIGN","Posição");
define("_AM_RIGHT","Direita");
define("_AM_LEFT","Esquerda");

define("_AM_EXPARTS","Artigos Expirados");
define("_AM_EXPIRED","Expirado");
define("_AM_CHANGEEXPDATETIME","Alterar a data/hora de expiração");
define("_AM_SETEXPDATETIME","Definir data/hora de expiração");
define("_AM_NOWSETEXPTIME","Data/Hora atual para expiração: %s");

// Added in RC3
define("_AM_ERRORTOPICNAME", "Você precisa informar um nome para o Tópico!");
define("_AM_EMPTYNODELETE", "Não existe nada par apagar!");

// Added 240304 (Mithrandir)
define('_AM_GROUPPERM', 'Permissões de Envio/Aprovação/Visualização');
define('_AM_SELFILE','Selecione um arquivo para enviar');

// Added by Hervé
define('_AM_UPLOAD_DBERROR_SAVE','Erro ao anexar arquivo à história');
define('_AM_UPLOAD_ERROR','Erro ao enviar arquvio');
define('_AM_UPLOAD_ATTACHFILE','Arquivo(s) Anexado(s)');
define('_AM_APPROVEFORM', 'Permissões de Aprovação');
define('_AM_SUBMITFORM', 'Permissões de Envio');
define('_AM_VIEWFORM', 'Permissões de Visualização');
define('_AM_APPROVEFORM_DESC', 'Selecione quem pode Aprovar notícias');
define('_AM_SUBMITFORM_DESC', 'Selecione quem pode enviar notícias');
define('_AM_VIEWFORM_DESC', 'Selecione quem pode ver quais tópicos');
define('_AM_DELETE_SELFILES', 'Apagar arquivos selecionados');
define('_AM_TOPIC_PICTURE', 'Enviar imagem');
define('_AM_UPLOAD_WARNING', '<B>Atenção, não esqueça de aplicar permissões de escrita para o seguinte diretório: %s</B>');

define('_AM_NEWS_UPGRADECOMPLETE', 'Atualização completa');
define('_AM_NEWS_UPDATEMODULE', 'Atualizar modelos de módulos e blocos');
define('_AM_NEWS_UPGRADEFAILED', 'Falha ao atualizar');
define('_AM_NEWS_UPGRADE', 'Atualizar');
define('_AM_ADD_TOPIC','Adicionar um tópico');
define('_AM_ADD_TOPIC_ERROR','Erro, o tópico já existe!');
define('_AM_ADD_TOPIC_ERROR1','ERRO: Não foi possível selecionar este tópico para um tópico relacionado!');
define('_AM_SUB_MENU','Publicar este tópico como um submenu');
define('_AM_SUB_MENU_YESNO','Submenu?');
define('_AM_HITS', 'Cliques');
define('_AM_CREATED', 'Criado');

define('_AM_TOPIC_DESCR', "Descrição do Tópico");
define('_AM_USERS_LIST', "Lista de Usuários");
define('_AM_PUBLISH_FRONTPAGE', "Publicar na página inicial?");
define('_AM_NEWS_UPGRADEFAILED1', 'Impossível criar a tabela stories_files');
define('_AM_NEWS_UPGRADEFAILED2', "Impossível alterar o tamanho do título do tópico");
define('_AM_NEWS_UPGRADEFAILED21', "Impossível adicionar novos campos à tabela de tópicos");
define('_AM_NEWS_UPGRADEFAILED3', 'Impossível criar a tabela stories_votedata');
define('_AM_NEWS_UPGRADEFAILED4', "Impossível criar os campos 'rating' e 'votes' na tabela 'story'");
define('_AM_NEWS_UPGRADEFAILED0', "Por favor, anote essas mensagens e tente corrigir esses problemas usanfo o phpMyadmin e o arquivo de definições sql disponível na pasta do módulo NEWS");
define('_AM_NEWS_UPGR_ACCESS_ERROR',"Erro, para usar o script de atualização, você precisa ser administrador neste módulo");
define('_AM_NEWS_PRUNE_BEFORE',"Expurgar histórias publicadas anteriormente");
define('_AM_NEWS_PRUNE_EXPIREDONLY',"Remover apenas as histórias expiradas");
define('_AM_NEWS_PRUNE_CONFIRM',"ATENÇÃO, você está prestes a remover permanentemente as histórias que foram publicadas antes %s (esta ação não poderá ser desfeita). Isto representa um total de %s Histórias.<br />Tem certeza que deseja continuar?");
define('_AM_NEWS_PRUNE_TOPICS',"Limite para os seguintes tópicos");
define('_AM_NEWS_PRUNENEWS', 'Expurgar notícias');
define('_AM_NEWS_EXPORT_NEWS', 'Exportar notícias (em XML)');
define('_AM_NEWS_EXPORT_NOTHING', "Desculpe, mas não há nada a ser exportado. Por favor, verifique os critérios utilizados");
define('_AM_NEWS_PRUNE_DELETED', '%d notícias foram apagadas');
define('_AM_NEWS_PERM_WARNING', '<h2>ATENÇÃO, você tem três formulários e, portanto, três botões de envio</h2>');
define('_AM_NEWS_EXPORT_BETWEEN', 'Exportar notícias publicadas entre');
define('_AM_NEWS_EXPORT_AND', ' e ');
define('_AM_NEWS_EXPORT_PRUNE_DSC', "Se você não marcar nada, todos os tópicos serão usados, caso contrário, apenas os tópicos selecionados serão usados");
define('_AM_NEWS_EXPORT_INCTOPICS', 'Incluir definições dos tópicos?');
define('_AM_NEWS_EXPORT_ERROR', 'Erro ao tentar criar o arquivo %s. Operação interrompida.');
define('_AM_NEWS_EXPORT_READY', "Seu arquivo xml exportado está pronto para descarga. <br /><a href='%s'>Clique aqui para baixá-lo</a>.<br />Não esqueça de <a href='%s'>removê-lo</a> após terminar.");
define('_AM_NEWS_RSS_URL', "Endereço para RSS");
define('_AM_NEWS_NEWSLETTER', "Folheto Informativo");
define('_AM_NEWS_NEWSLETTER_BETWEEN', 'Selecionar notícias publicadas entre');
define('_AM_NEWS_NEWSLETTER_READY', "Seu folheto informativo está pronto para descarga. <br /><a href='%s'>Clique aquipara baixá-lo</a>.<br />Não esqueça de <a href='%s'>removê-lo</a> após terminar.");
define('_AM_NEWS_DELETED_OK',"Arquivo apagado com sucesso");
define('_AM_NEWS_DELETED_PB',"Ocorreu um problema ao apagar o arquivo");
define('_AM_NEWS_STATS0','Estatísticas dos Tópicos');
define('_AM_NEWS_STATS','Estatísticas');
define('_AM_NEWS_STATS1','Autores Exclusivos');
define('_AM_NEWS_STATS2','Totais');
define('_AM_NEWS_STATS3','Estatísticas de Artigos');
define('_AM_NEWS_STATS4','Artigos mais lidos');
define('_AM_NEWS_STATS5','Artigos menos lidos');
define('_AM_NEWS_STATS6','Artigos mais classificados');
define('_AM_NEWS_STATS7','Autores mais lidos');
define('_AM_NEWS_STATS8','Autores mais classificados');
define('_AM_NEWS_STATS9','Maiores Contribuintes');
define('_AM_NEWS_STATS10','Estatísticas dos Autores');
define('_AM_NEWS_STATS11',"Contagem de Artigos");
define('_AM_NEWS_HELP',"Ajuda");
define("_AM_NEWS_MODULEADMIN","Administração do Módulo");
define("_AM_NEWS_GENERALSET", "Configurações do Módulo" );
define('_AM_NEWS_GOTOMOD','Ir para o módulo');
define('_AM_NEWS_NOTHING',"Desculpe mas não há nada para baixar, verifique os critérios usados!");
define('_AM_NEWS_NOTHING_PRUNE',"Desculpe mas não há nada a expurgar, verifique os critérios usados!");
define('_AM_NEWS_TOPIC_COLOR',"Cor dos tópicos");
define('_AM_NEWS_COLOR',"Cor");
define('_AM_NEWS_REMOVE_BR',"Converter o código html &lt;br&gt; para uma nova linha?");
// Added in 1.3 RC2
define('_AM_NEWS_PLEASE_UPGRADE',"<a href='upgrade.php'><font color='#FF0000'>Por favor, atualize o módulo!</font></a>");

// Added in verisn 1.50
define('_AM_NEWS_NEWSLETTER_HEADER', "Cabeçalho");
define('_AM_NEWS_NEWSLETTER_FOOTER', "Rodapé");
define('_AM_NEWS_NEWSLETTER_HTML_TAGS', "Remover códigos html?");
define('_AM_NEWS_VERIFY_TABLES','Manter tabelas');
define('_AM_NEWS_METAGEN',"Metadados");
define('_AM_NEWS_METAGEN_DESC',"Metadados é um sistema que pode ajudá-lo a indexar melhor sua página nos mecanismos de busca.<br />Se você não digitar os Metadados para palavras-chave e Descrição por você mesmo, o módulo irá criá-los automaticamente.");
define('_AM_NEWS_BLACKLIST',"Lista negra");
define('_AM_NEWS_BLACKLIST_DESC',"As palavras nesta lista não serão usadas para a criação dos Metadados de Palavras-chave");
define('_AM_NEWS_BLACKLIST_ADD',"Adicionar");
define('_AM_NEWS_BLACKLIST_ADD_DSC',"Informe as palavras para adicionar à lista<br />(uma palavra por linha)");
define('_AM_NEWS_META_KEYWORDS_CNT',"Contagem máxima de palavras-chave para geração automática");
define('_AM_NEWS_META_KEYWORDS_ORDER',"Ordem das Palavras-chave");
define('_AM_NEWS_META_KEYWORDS_INTEXT',"Criá-las na mesma ordem em que aparecem no texto");
define('_AM_NEWS_META_KEYWORDS_FREQ1',"Ordem crescente por frequência das palavras");
define('_AM_NEWS_META_KEYWORDS_FREQ2',"Ordem decrescente por frequência das palavras");
?>