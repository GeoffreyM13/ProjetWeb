
<!-- MARTINEZ GEOFFREY -->
<!-- notif pour le chat -->
function Notification(action) {

    if (action == 'chat') {

        $.bootstrapGrowl('Votre chat a bien été envoyé !', {

            ele: '.chatbox',
            type: 'success',
            offset: {from: 'top', amount: 20},
            delay: 3000,
            width: 250,
            allow_dismiss: true,
            align: 'right'


        });
    }
}