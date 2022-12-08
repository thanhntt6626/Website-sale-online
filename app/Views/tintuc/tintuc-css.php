<style>
    ::-webkit-scrollbar {
        width: 8px;
    }

    /* Track */
    ::-webkit-scrollbar-track {
        background: #f1f1f1;
    }

    /* Handle */
    ::-webkit-scrollbar-thumb {
        background: #888;
    }

    /* Handle on hover */
    ::-webkit-scrollbar-thumb:hover {
        background: #555;
    }

    @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');

    * {
        margin: 0;
        padding: 0;
    }

    .cap {
        position: relative;
        width: 300px;
        height: 400px;
        transition: 1s;
        /* margin-left: 30px; */
    }

    .cap:hover {
        transform: scale(1.05);
        z-index: 2;
    }

    .img-tintuc {
        height: 280px;
        width: 100%;
    }

    .overplay {
        height: 300px;
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        opacity: 0;
        transition: opacity 0.4s ease-in-out;
        background: rgb(74, 70, 70);
        cursor: pointer;

    }

    .content {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        color: white;
        font-family: verdana;
        text-align: center;
    }

    .cap:hover .overplay {
        opacity: 0.8;
    }

    .news {
        position: absolute;
        margin-top: -5px;
        height: 100px;
        background: rgb(213, 204, 204);
    }

    .badge {
        position: absolute;
        margin-top: 5px;
        margin-left: 10px;
        margin-right: 10px;
        color: white;
        background-color: #cc5628
    }

    .news p {
        margin-top: 35px;
        margin-left: 10px;
        font-weight: 600;
        font-size: 18px;
    }

    .content p {
        width: 280px;
        font-weight: 600;
        font-size: 13px;
    }

    @media only screen and (max-width: 740px) {
        .cap {
            position: relative;
            width: 300px;
            height: 400px;
            transition: 1s;
            margin-left: 30px;
        }
    }

    @media only screen and (min-width:740px) and (max-width: 1024px) {
        .img-fluid {
            height: 208.33px;
        }

        .img-fluid2 {
            height: 131.33px;
        }

        .img-fluid3 {
            width: 333px;
            height: 194px;
        }
    }
</style>