
<style>
    * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }

    body {
        font-family: sans-serif;
    }

    .product {
        width: 100%;
        height: 100vh;
    }

    .product__images {
        width: 100%;
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    .product__main-image {
        max-width: 500px;
        max-height: 600px;
        object-fit: cover;
        cursor: pointer;
        border: 1px solid #070707;
    }

    .product__slider-wrap {
        max-width: 500px;
        min-height: 100px;
        display: flex;
        align-items: center;
    }

    .product__slider {
        width: 100%;
        display: flex;
        flex-wrap: nowrap;
        overflow-x: auto;
    }

    .product__image {
        max-width: 180px;
        max-height: 100px;
        object-fit: cover;
        cursor: pointer;
        opacity: 0.5;
        margin: 0.25rem;
        border: 1px solid #070707;
    }

    .product__image:first-child {
        margin-left: 0;
    }

    .product__image:last-child {
        margin-right: 0;
    }

    .product__image:hover {
        opacity: 1;
    }

    .product__image--active {
        opacity: 1;
    }

    .product__slider::-webkit-scrollbar {
        height: 10px;
    }

    .product__slider::-webkit-scrollbar-thumb {
        background-color: #f9564f;
        border-radius: 50px;
    }
</style>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width" />
    <link rel="stylesheet" href="style.css" type="text/css" media="all" />
    <title>product page</title>
</head>

<body>
    <div class="product">
        <div class="product__images">
            <img src="https://res.cloudinary.com/dard8s66g/image/upload/v1647993803/ecommerce/smartphone/623a63c9251afc7d338faab5/vzjovup3izma7q2skzcf.jpg"
                alt="google pixel 6" class="product__main-image" id="main-image" />

            <div class="product__slider-wrap">
                <div class="product__slider">
                    <img src="https://res.cloudinary.com/dard8s66g/image/upload/v1647993803/ecommerce/smartphone/623a63c9251afc7d338faab5/vzjovup3izma7q2skzcf.jpg"
                        alt="google pixel 6" class="product__image product__image--active" />
                    <img src="https://res.cloudinary.com/dard8s66g/image/upload/v1647993806/ecommerce/smartphone/623a63c9251afc7d338faab5/xtfslzmfpwg3bwoyylve.jpg"
                        alt="google pixel 6" class="product__image" />
                    <img src="https://res.cloudinary.com/dard8s66g/image/upload/v1647993811/ecommerce/smartphone/623a63c9251afc7d338faab5/kqp1ffmcfs2q6ctck36i.jpg"
                        alt="google pixel 6" class="product__image" />
                    <img src="https://res.cloudinary.com/dard8s66g/image/upload/v1647993808/ecommerce/smartphone/623a63c9251afc7d338faab5/fkco14duxzv8rnkyctbr.jpg"
                        alt="google pixel 6" class="product__image" />
                </div>
            </div>
        </div>
    </div>
    <script src="main.js"></script>
</body>

</html>
<script>
    const mainImage = document.getElementById("main-image");
    const images = document.querySelectorAll(".product__image");

    images.forEach((image) => {
        image.addEventListener("click", (event) => {
            mainImage.src = event.target.src;

            document
                .querySelector(".product__image--active")
                .classList.remove("product__image--active");

            event.target.classList.add("product__image--active");
        });
    });
</script>
