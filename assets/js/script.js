function qpf_rewrite_rules() {
    jQuery.post(QPF_ajax_url.url, {
        action: 'qpf_flush_rules',
        _nonce: QPF_ajax_url.nonce
    }, function(response) {
        // console.log( response );
        if (response.success) {
            alert('Permalink reset successfully!');
        } else {
            alert('Failed to reset permalink. Please try again');
        }
    });
}