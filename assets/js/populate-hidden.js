jQuery(document).ready(function($) {
    if (typeof acfVars !== 'undefined' && acfVars.downloadUrl) {
        // Replace 3 with your actual field ID
        var hiddenField = $('input[name="input_7"]');
        if (hiddenField.length) {
            hiddenField.val(acfVars.downloadUrl);
        }
    }
});