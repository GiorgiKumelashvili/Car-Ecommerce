import firebase from 'firebase/app';
import 'firebase/storage';
import 'bootstrap';

try {
    // popper and jquery for bootstrap
    window.Popper = require('popper.js').default;
    window.$ = window.jQuery = require('jquery');

    // axios
    window.axios = require('axios');
    window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

    // firebase
    firebase.initializeApp({
        apiKey: process.env.MIX_apiKey,
        authDomain: process.env.MIX_authDomain,
        projectId: process.env.MIX_projectId,
        storageBucket: process.env.MIX_storageBucket,
        messagingSenderId: process.env.MIX_messagingSenderId,
        appId: process.env.MIX_appId,
        measurementId: process.env.MIX_measurementId
    });

    console.log(firebase);
}
catch (e) {
    console.log(e)
}

function sleep(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
}

window.setUploadedImages = function () {
    const images = [];

    document.querySelector('input[type="file"]').addEventListener('change', function () {
        const arr = Object.values(this.files);
        const maxImages = 12;

        if (arr.length) {
            for (let file of arr) {
                if (images.length >= maxImages) break;

                images.push(file);

                const div = document.createElement('div');
                div.className = 'col-4';

                const img = document.createElement('img');
                img.onload = () => URL.revokeObjectURL(img.src);
                img.src = URL.createObjectURL(file);
                img.style.cssText = 'height:100%;width:100%;max-height:15rem;border-radius:1rem;margin-top:2rem';
                div.insertAdjacentElement('afterbegin', img)

                document.querySelector('.images').insertAdjacentElement('afterbegin', div);
            }
        }
    });

    return images;
}

window.uploadImagesToFirebase = async function (images, detailID, callback = false) {
    const newImagesNames = [];
    for (let i = 0; i < images.length; i++) {
        const img = images[i];
        const name = i === 0 ? `${detailID}-${i}-large.jpg` : `${detailID}-${i}.jpg`;
        console.log(name)
        newImagesNames.push(name);
        await sleep(500);

        await firebase
            .storage()
            .ref()
            .child('images/' + name)
            .put(img)
            .then(() => {
                if (callback)
                    callback();
            })
            .catch(err => console.log(err));
    }
    console.log('uploaded firebase');

    return newImagesNames;
}

window.uploadImagesToDb = async function (images, url, detailID, carID) {
    const firebaseFolder = 'images';
    const firebaseLink = 'https://firebasestorage.googleapis.com/v0/b/car-ecommerce.appspot.com/o/';
    const newIages = images.map(img => `${firebaseLink}${firebaseFolder}%2F${img}?alt=media`);

    axios.post(url, {images: newIages, detailID, carID})
        .then(res => {
            console.log(res);
        })
        .catch(err => {
            console.log(err);
        })

    console.log('uploaded db');
}
