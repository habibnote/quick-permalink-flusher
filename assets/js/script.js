function rewrite_rules() {
    jQuery.post(
        QuickPermalinkFlusher.ajax,
        {
            action: 'flush_rules',
            _nonce: QuickPermalinkFlusher.nonce,
        },
        function (response) {
            // console.log( response );
            if (response.success) {
                alert('Permalink reset successfully!');
            } else {
                alert('Failed to reset permalink. Please try again');
            }
        }
    );
}
