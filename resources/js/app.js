import './bootstrap';


Echo.private('App.Models.User.'+ userId)
    .notification((notification) => {
        // console.log(notification.data);
        toaster.succsess(notification.data);

    });
