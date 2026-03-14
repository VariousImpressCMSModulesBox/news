<?php
// $Id: modinfo.php,v 1.21 2004/09/01 17:48:07 hthouzard Exp $
// Module Info

// The name of this module
define('_MI_NEWS_NAME','Notícias');

// A brief description of this module
define('_MI_NEWS_DESC',"Criar seção de notícias tipo 'Slashdot', onde os usuários possam enviar notícias/comentários.");

// Names of blocks for this module (Not all module has blocks)
define('_MI_NEWS_BNAME1','Tópicos de Notícias');
define('_MI_NEWS_BNAME3','Grande História');
define('_MI_NEWS_BNAME4','Mais Lidas');
define('_MI_NEWS_BNAME5','Notícias Recentes');
define('_MI_NEWS_BNAME6','Moderar Notícias');
define('_MI_NEWS_BNAME7','Navegar pelos Tópicos');

// Sub menus in main menu block
define('_MI_NEWS_SMNAME1','Enviar Notícia');
define('_MI_NEWS_SMNAME2','Arquivo');

// Names of admin menu items
define('_MI_NEWS_ADMENU2', 'Gerenciador de Tópicos');
define('_MI_NEWS_ADMENU3', 'Publicar/Editar Notícias');
define('_MI_NEWS_GROUPPERMS', 'Permissões');
// Added by Hervé for prune option
define('_MI_NEWS_PRUNENEWS', 'Expurgar Notícia');
// Added by Hervé
define('_MI_NEWS_EXPORT', 'Exportar Notícia');

// Title of config items
define('_MI_STORYHOME', 'Selecione o número de notícias a exibir no topo da página');
define('_MI_NOTIFYSUBMIT', 'Selecione sim para enviar uma mensagem de notificação para o webmaster a cada notícia enviada');
define('_MI_DISPLAYNAV', 'Selecione sim para mostrar a caixa de navegação no topo de cada página de notícias');
define('_MI_AUTOAPPROVE','Aprovar automaticamente as notícias sem necessidade de intervenção do administrador?');
define("_MI_ALLOWEDSUBMITGROUPS", "Grupos que podem enviar notícias");
define("_MI_ALLOWEDAPPROVEGROUPS", "Grupos que podem aprovar notícias enviadas");
define("_MI_NEWSDISPLAY", "Modo de exibição das notícias");
define("_MI_NAMEDISPLAY","Nome do Autor");
define("_MI_COLUMNMODE","Colunas");
define("_MI_STORYCOUNTADMIN","Número de artigos novos a exibir na área de administração (esta opção também será usada para limitar o número de tópicos mostrados na área de administração e isto será usado nas estatísticas) : ");
define('_MI_UPLOADFILESIZE', 'Tamanho máximo do arquivo a ser enviado (KB) 1048576 = 1 MB');
define("_MI_UPLOADGROUPS","Grupos autorizados a enviar arquivos");


// Description of each config items
define('_MI_STORYHOMEDSC', '');
define('_MI_NOTIFYSUBMITDSC', '');
define('_MI_DISPLAYNAVDSC', '');
define('_MI_AUTOAPPROVEDSC', '');
define("_MI_ALLOWEDSUBMITGROUPSDESC", "Os grupos selecionados terão permissão para eviar notícias");
define("_MI_ALLOWEDAPPROVEGROUPSDESC", "Os grupos selecionados terão permissão para aprovar notícias");
define("_MI_NEWSDISPLAYDESC", "Clássico mostra todas as notícias ordenadas por data de publicação. Notícias por tópico agrupará as notícias por tópico, exibindo a última notícia por completo e apenas o título das demais");
define('_MI_ADISPLAYNAMEDSC', 'Selecione como exibir o nome do autor');
define("_MI_COLUMNMODE_DESC","Você pode definir o número de colunas para exibir a lista de artigos");
define("_MI_STORYCOUNTADMIN_DESC","");
define("_MI_UPLOADFILESIZE_DESC","");
define("_MI_UPLOADGROUPS_DESC","Selecione os grupos que podem enviar arquivos para o servidor");

// Name of config item values
define("_MI_NEWSCLASSIC", "Clássico");
define("_MI_NEWSBYTOPIC", "Por Tópico");
define("_MI_DISPLAYNAME1", "Nome de Usuário");
define("_MI_DISPLAYNAME2", "Nome Real");
define("_MI_DISPLAYNAME3", "Ocultar Autor");
define("_MI_UPLOAD_GROUP1","Remetentes e Aprovadores");
define("_MI_UPLOAD_GROUP2","Apenas aprovadores");
define("_MI_UPLOAD_GROUP3","Desativar envio de arquivos");

// Text for notifications

define('_MI_NEWS_GLOBAL_NOTIFY', 'Global');
define('_MI_NEWS_GLOBAL_NOTIFYDSC', 'Opções Globais de notificação.');

define('_MI_NEWS_STORY_NOTIFY', 'História');
define('_MI_NEWS_STORY_NOTIFYDSC', 'Opção de notificação que se aplica à história atual.');

define('_MI_NEWS_GLOBAL_NEWCATEGORY_NOTIFY', 'Novo tópico');
define('_MI_NEWS_GLOBAL_NEWCATEGORY_NOTIFYCAP', 'Notificar-me quando um novo tópico for criado.');
define('_MI_NEWS_GLOBAL_NEWCATEGORY_NOTIFYDSC', 'Receber notificação quando um novo tópico for criado.');
define('_MI_NEWS_GLOBAL_NEWCATEGORY_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} auto-notificação: Novo tópico de notícas');

define('_MI_NEWS_GLOBAL_STORYSUBMIT_NOTIFY', 'Nova história enviada');
define('_MI_NEWS_GLOBAL_STORYSUBMIT_NOTIFYCAP', 'Notificar-me quando uma nova história for enviada (aguardando aprovação).');
define('_MI_NEWS_GLOBAL_STORYSUBMIT_NOTIFYDSC', 'Receber notificação quando uma nova história for enviada (aguardando aprovação).');
define('_MI_NEWS_GLOBAL_STORYSUBMIT_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} auto-notificação: Nova história enviada');

define('_MI_NEWS_GLOBAL_NEWSTORY_NOTIFY', 'Nova história');
define('_MI_NEWS_GLOBAL_NEWSTORY_NOTIFYCAP', 'Notificar-me quando uma nova história for publicada.');
define('_MI_NEWS_GLOBAL_NEWSTORY_NOTIFYDSC', 'Receber notificação quando uma nova história for publicada.');
define('_MI_NEWS_GLOBAL_NEWSTORY_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} auto-notificação: Nova história publicada');

define('_MI_NEWS_STORY_APPROVE_NOTIFY', 'História aprovada');
define('_MI_NEWS_STORY_APPROVE_NOTIFYCAP', 'Notificar-me quando esta história for aprovada.');
define('_MI_NEWS_STORY_APPROVE_NOTIFYDSC', 'Receber notificação quando esta história for aprovada.');
define('_MI_NEWS_STORY_APPROVE_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} auto-notificação: História aprovada');

define('_MI_RESTRICTINDEX', 'Tópicos restritos na página inicial?');
define('_MI_RESTRICTINDEXDSC', 'Se configurado para sim, os usuários verão apenas os itens de notícias listados na página inicial dos tópicos aos quais eles têm acesso, conforme configurado nas permissões das notícias');

define('_MI_NEWSBYTHISAUTHOR', 'Notícias do mesmo autor');
define('_MI_NEWSBYTHISAUTHORDSC', 'Se você marcar sim, então um link \'Artigos deste autor\' estará visível');

define('_MI_NEWS_PREVNEX_LINK','Mostrar link Anterior e Próximo?');
define('_MI_NEWS_PREVNEX_LINK_DESC','Quando esta opcção estiver marcada como \'Sim\', dois novos links estarão visíveis ao final de cada artigo. Estes links são usados para ir para o artigo anterior ou para o próximo artigo, de acordo com a data de publicação');
define('_MI_NEWS_SUMMARY_SHOW','Mostrar tabela de sumário?');
define('_MI_NEWS_SUMMARY_SHOW_DESC','Quando você ativa esta opção, um sumário contendo links para todos os artigos publicados mais recentemente estará visível ao final de cada artigo');
define('_MI_NEWS_AUTHOR_EDIT','Permitir que os autores editem seus comentários?');
define('_MI_NEWS_AUTHOR_EDIT_DESC','Com esta opção ativada, os usuários terão permissão de editar seus comentários.');
define('_MI_NEWS_RATE_NEWS','permitir que os usuários classifiquem as notícias?');
define('_MI_NEWS_TOPICS_RSS','Ativar RSS por tópicos?');
define('_MI_NEWS_TOPICS_RSS_DESC',"Se você configurar esta opção para 'Sim', o conteúdo dos tópicos estará disponível como fonte RSS");
define('_MI_NEWS_DATEFORMAT', "Formato de data");
define('_MI_NEWS_DATEFORMAT_DESC',"Por favor, consulte a documentação do PHP (http://fr.php.net/manual/en/function.date.php) para mais informações sobre como selecionar o formato. Note que se você não digitar nada, o formato padrão será usado");
define('_MI_NEWS_META_DATA', "Ativar meta dados para Palavras-chave e Descrição?");
define('_MI_NEWS_META_DATA_DESC', "Se você configurar esta opção como 'sim' então os aprovadors serão capazes de informar os seguintes meta dados: keywords e description");
define('_MI_NEWS_BNAME8','Notícias aleatórias');
define('_MI_NEWS_NEWSLETTER',"Folheto Informativo");
define('_MI_NEWS_STATS','Estatísticas');
define("_MI_NEWS_FORM_OPTIONS","Opções do Formulário");
define("_MI_NEWS_FORM_COMPACT","Compacto");
define("_MI_NEWS_FORM_DHTML","DHTML");
define("_MI_NEWS_FORM_SPAW","Editor Spaw");
define("_MI_NEWS_FORM_HTMLAREA","Editor HtmlArea");
define("_MI_NEWS_FORM_FCK","Editor FCK");
define("_MI_NEWS_FORM_KOIVI","Editor Koivi");
define("_MI_NEWS_FORM_OPTIONS_DESC","Selecione o editor a ser usado. Se você tem uma instalação 'simples' (por exemplo, se você usa apenas o editor fornecido com o pacote padrão de instalação do Xoops), então você deve selecionar apenas DHTML e Compacto");
define("_MI_NEWS_KEYWORDS_HIGH","Destacar palavras-chave?");
define("_MI_NEWS_KEYWORDS_HIGH_DESC","Se você usar esta opção, as palavras-chave informadas na busca serão destacadas nos artigos");
define("_MI_NEWS_HIGH_COLOR","Cor a ser usada para destacar as palavras-chave?");
define("_MI_NEWS_HIGH_COLOR_DES","Utilize esta opção apenas se você escolheu 'sim' para a opção anterior");
define("_MI_NEWS_INFOTIPS","Tamanho da Janela de Dicas");
define("_MI_NEWS_INFOTIPS_DES","Se você usar esta opção os links relacionados às notícias terão os primeiros (n) caracteres do artigo. Se você definir este valor como 0 as janelas de dicas ficarão vazias");
define("_MI_NEWS_SITE_NAVBAR","Usar a barra de navegação de sites do Mozilla e do Opera?");
define("_MI_NEWS_SITE_NAVBAR_DESC","Se você configurar esta opção como sim, os visitantes do seu sítio serão capazes de utiluzar a barra de navegação de sites para navegar pelos artigos.");
define("_MI_NEWS_TABS_SKIN","Selecione a pele a ser usada nas abas");
define("_MI_NEWS_TABS_SKIN_DESC","Esta pele será usada por todos os blocos que usam abas");
define("_MI_NEWS_SKIN_1","Estilo da Barra");
define("_MI_NEWS_SKIN_2","Chanfrada");
define("_MI_NEWS_SKIN_3","Clássica");
define("_MI_NEWS_SKIN_4","Pastas");
define("_MI_NEWS_SKIN_5","MacOs");
define("_MI_NEWS_SKIN_6","Plana");
define("_MI_NEWS_SKIN_7","Arredondada");
define("_MI_NEWS_SKIN_8","Estilo ZDnet");

// Added in version 1.50
define('_MI_NEWS_BNAME9','Arquivos');
define("_MI_NEWS_FORM_TINYEDITOR","Editor Compacto");
define("_MI_NEWS_FOOTNOTES","Mostrar links nas versões para impressão dos artigos?");
define("_MI_NEWS_DUBLINCORE","Ativar Metadados 'Dublin Core'?");
define("_MI_NEWS_DUBLINCORE_DSC","Para mais informações, clique <a href='http://dublincore.org/'>aqui</a>");
define("_MI_NEWS_BOOKMARK_ME","Mostrar bloco 'Marcar este artigo como favorito'?");
define("_MI_NEWS_BOOKMARK_ME_DSC","Este bloco estará visível na página de artigos");
define("_MI_NEWS_FF_MICROFORMAT","Ativar Micro Sumários do Firefox 2?");
define("_MI_NEWS_FF_MICROFORMAT_DSC","Para mais informações, clique <a href='http://wiki.mozilla.org/Microsummaries' target='_blank'>aqui</a>");
define("_MI_NEWS_WHOS_WHO","Quem é quem");
define("_MI_NEWS_METAGEN","Gerador de Metatags");
define("_MI_NEWS_TOPICS_DIRECTORY","Listar Tópicos");
define("_MI_NEWS_ADVERTISEMENT","Anúncio");
define("_MI_NEWS_ADV_DESCR","Entre um texto ou um código javascript para mostrar nos artigos");
define("_MI_NEWS_MIME_TYPES","Informe os tipos de arquivos permitidos para envio (separe os tipos em uma nova linha)");
define("_MI_NEWS_ENHANCED_PAGENAV","Usar navegador de páginas avançado?");
define("_MI_NEWS_ENHANCED_PAGENAV_DSC","Com esta opção, você pode separar suas páginas utilizando: [pagebreak:Título da Página], os links para as páginas serão substituídos por uma caixa de seleção e você pode usar [sumary] para criar um sumário automático das páginas");
// Added in version 1.54
define('_MI_NEWS_CATEGORY_NOTIFY','Categoria');
define('_MI_NEWS_CATEGORY_NOTIFYDSC','Opções de notificação que aplicam à categoria atual');

define('_MI_NEWS_CATEGORY_STORYPOSTED_NOTIFY', 'Nova notícia enviada');
define('_MI_NEWS_CATEGORY_STORYPOSTED_NOTIFYCAP', 'Notifique quando qualquer nova notíca é enviada para esta categoria.');
define('_MI_NEWS_CATEGORY_STORYPOSTED_NOTIFYDSC', 'Receber notificação quando qualquer nova notícia é enviada para esta categoria.');
define('_MI_NEWS_CATEGORY_STORYPOSTED_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} auto-notificação: Notícia nova');
?>