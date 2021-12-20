$(document).ready(function() {
    // Toggle fields depending on specific project type
    if ($('.create-project-form').length) {
        $('.select-project-type').change(function(event) {
            if ($(event.target).find('option:selected').text() === 'GzA') {
                $('.toggled-liability').show();
            } else {
                $('.toggled-liability').hide();
            }
        });

        // Cause default check when form is loaded
        $('.select-project-type').trigger('change');
    }
});