$('#contactForm').on('submit', function (e) {
    e.preventDefault();

    $.ajax({
        url: './assets/contact.php', 
        type: 'POST', 
        data: $(this).serialize(),
        success: function (response) { 
            $('#result').html(response);
        },
        error: function () { 
            $('#result').html('Une erreur s\'est produite lors de l\'envoi de votre message');
        }
    });
});