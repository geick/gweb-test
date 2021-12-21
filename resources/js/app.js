$(document).ready(function() {
    if ($('.project-form').length) {
        initDynamicProjectTypes();
        initDatepickers();
        initOptionalFields();
    }
});


// Toggle fields depending on specific project type
function initDynamicProjectTypes() {
    $('.select-project-type').change(function(event) {
        if ($(event.target).find('option:selected').text() === 'GzA') {
            $('.toggled-liability-field').show();
        } else {
            $('.toggled-liability-field').hide();
        }
    });

    // Cause default check when form is loaded
    $('.select-project-type').trigger('change');
}

// Hooking up datepickers for project duration
function initDatepickers() {
    const startPicker = datepicker('.project-form .start-date', {
        startDay: 1,
        formatter: (input, date, instance) => {
            const value = date.toLocaleDateString('de-DE');
            input.value = value;
        },
    });

    const endPicker = datepicker('.project-form .end-date', {
        startDay: 1,
        formatter: (input, date, instance) => {
            const value = date.toLocaleDateString('de-DE');
            input.value = value;
        },
    });
}

// Manage optional fields in project form
function initOptionalFields() {
    // Assemble multiple fields into single JSON string
    $('.optional-field-template input, .optional-field-template textarea').change(function() {
        var optionalFieldData = [];

        $.each($('.optional-field'), function(i, element) {
            var fieldName = $(this).find('#field-name').val();
            var fieldValues = $(this).find('#field-values').val();

            optionalFieldData.push([fieldName, fieldValues]);
        });

        $('.optional-fields').val(JSON.stringify(optionalFieldData));
    });

    $('.add-optional-field').click(function(event) {
        event.preventDefault();

        var optionalFieldsCount = $('.optional-field').length;

        $optionalFieldTemplate = $('.optional-field-template');
        $newOptionalField = $optionalFieldTemplate.clone(true);

        $newOptionalField.removeClass('optional-field-template')
            .addClass('optional-field')
            .find('.optional-field-index').text(optionalFieldsCount+1);

        $($newOptionalField).insertBefore('.add-optional-field');
    });
}