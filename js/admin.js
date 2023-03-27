jQuery(document).ready(function () {
   var upplugcount = jQuery(
      "#menu-plugins .update-plugins .plugin-count"
   ).html();
   if (upplugcount !== "0") {
      jQuery("hr.wp-header-end").after(
         '<div class="notice notice-error inline"><p>Importante: ci sono ' +
            upplugcount +
            " componenti del sito da aggiornare. Contatta il gestore del sito il prima possibile.</p></div>"
      );
   }
});
