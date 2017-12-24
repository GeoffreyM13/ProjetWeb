
<!-- MARTINEZ GEOFFREY -->
<!-- notif pour le chat -->
<!-- FINALEMENT INCLUS DANS LA PAGE CHATSUCCESS CAR NE FONCTIONNE PAS DEPUIS CETTE PAGE MALGRES LINCLUSION -->
<!-- DANS LE LAYOUT DUN HEADER ... -->

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