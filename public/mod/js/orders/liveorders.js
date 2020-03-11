
window.onload = () => {
    const socket = io.connect('http://localhost:3000');

    socket.on('connect', () => {
        console.log('baglandi!');

        socket.on('newOrder', (data) => {
           console.log('geldi');
           console.log(data);
        });

    });

    document.getElementById('pendingorders').click()
}
