<?php
  js_file('https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js');
?>

<script>
  const welcomeMessage = '¿Acepta nuestros términos y condiciones para continuar? si / no'
  var botmanWidget = {
    frameEndpoint: '/bot/widget',
    chatServer: '/bot',
    introMessage: welcomeMessage,
    placeholderText: 'Escríbenos',
    title: 'Alia24',
    aboutText: '<?= get_bloginfo( 'name' ); ?>',
    bubbleAvatarUrl: 'https://upload.wikimedia.org/wikipedia/commons/a/a7/React-icon.svg', // TODO Personalizar
    bubbleBackground: '#FFF'
  };
</script>

