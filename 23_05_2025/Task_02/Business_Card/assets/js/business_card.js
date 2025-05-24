$(document).ready(function () {
    $('#platformDropdown').on('change', function () {
        let selectedOption = $(this).find('option:selected');
        let id = selectedOption.val();
        let name = selectedOption.data('name');
        let social_links_default = $('#social_links_default');
        let social_links_custom = $('#social_links_custom');

        if (id) {
            let inputHtml = `
    <div class="form-group platform-input" data-id="${id}">
        <div class="input-group mb-2">
            <input type="hidden" name="platform_ids[]" value="${id}">
            <input type="text" name="platform_links[${id}]" class="form-control" placeholder="${name} Link" required>
            <button type="button" class="btn btn-danger remove-platform-btn">
                <i class="bi bi-trash"></i>
            </button>
        </div>
    </div>`;

            // Check if the platform already exists
            $('#platformInputs').append(inputHtml);
            social_links_default.addClass('d-none');
            $.ajax({
                url: "ajax/select_icon.php",
                type: "POST",
                data: { id: id },
                success: function (response) {
                    social_links_custom.append(response);
                }
            })

            // Remove selected option from dropdown
            selectedOption.remove();
        }
    });

    $('#platformInputs').on('click', '.remove-platform-btn', function () {
        let inputGroup = $(this).closest('.platform-input');
        let id = inputGroup.data('id');
        let name = inputGroup.find('input[placeholder]').attr('placeholder').replace(' Link', '');

        // Remove input field
        inputGroup.remove();

        // Remove corresponding social icon from custom links
        $('#social_links_custom').find(`.social-icon[data-id="${id}"]`).remove();

        // Re-add to dropdown
        $('#platformDropdown').append(`<option value="${id}" data-name="${name}">${name}</option>`);

        // If no platform inputs are left, show default links
        if ($('#platformInputs .platform-input').length === 0) {
            $('#social_links_default').removeClass('d-none');
            $('#social_links_custom').empty(); // Optional: clear custom links completely
        }
    });

    $('#platformInputs').on('input', 'input[name^="platform_links["]', function () {
        let input = $(this);
        let rawValue = input.val();
        let id = input.closest('.platform-input').data('id');

        // Add https:// if missing and value is not empty
        let value = rawValue.trim();
        if (value && !/^https?:\/\//i.test(value)) {
            value = 'https://' + value;
        }

        // Simple URL validation
        const isValidUrl = /^(https?:\/\/)[^\s/$.?#].[^\s]*$/i.test(value);

        // Update the corresponding social icon link
        if (isValidUrl) {
            $(`#link_${id}`).attr('href', value);
            input.removeClass('is-invalid'); // optional: Bootstrap class for valid input
        } else {
            $(`#link_${id}`).attr('href', '#');
            input.addClass('is-invalid'); // optional: Bootstrap class for invalid input
        }
    });

});