(function( $ ) {
	'use strict';

	/**
	 * All of the code for your admin-facing JavaScript source
	 * should reside in this file.
	 *
	 * Note: It has been assumed you will write jQuery code here, so the
	 * $ function reference has been prepared for usage within the scope
	 * of this function.
	 *
	 * This enables you to define handlers, for when the DOM is ready:
	 *
	 * $(function() {
	 *
	 * });
	 *
	 * When the window is loaded:
	 *
	 * $( window ).load(function() {
	 *
	 * });
	 *
	 * ...and/or other possibilities.
	 *
	 * Ideally, it is not considered best practise to attach more than a
	 * single DOM-ready or window-load handler for a particular page.
	 * Although scripts in the WordPress core, Plugins and Themes may be
	 * practising this, we should strive to set a better example in our own work.
	 */

})( jQuery );



jQuery(document).ready(function($) {
    // Initialize DataTables
    var table = $('#store-categories').DataTable({
        "paging": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "responsive": true
    });

    // Handle delete button click
    $('#store-categories').on('click', '.delete-btn', function() {
        var row = $(this).closest('tr');
        var id = $(this).data('id');

        if (confirm('Are you sure you want to delete this item?')) {
            $.ajax({
                url: datatableParams.ajax_url,
                type: 'POST',
                data: {
                    action: 'delete_category',
                    id: id,
                    nonce: datatableParams.nonce
                },
                success: function(response) {
                    if (response.success) {
                        table.row(row).remove().draw(); // Remove row from DataTable
                        alert('Item deleted successfully.');
                    } else {
                        alert('Error: ' + response.data.message);
                    }
                },
                error: function() {
                    alert('An error occurred while processing your request.');
                }
            });
        }
    });
});