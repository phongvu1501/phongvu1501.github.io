let list = document.getElementById('list');
let filter = document.getElementById('filter');
let count = document.getElementById('count');

let listProduct = [{
        id: 1,
        image: "/img/7.jpg",
        name: "Giày thể thao 1",
        price: 1500000,
        sale: 1000000
    },
    {
        id: 2,
        image: "/img/8.jpg",
        name: "Giày thể thao 2",
        price: 1500000,
        sale: 1000000
    },
    {
        id: 3,
        image: "/img/9.jpg",
        name: "Giày thể thao 3",
        price: 1500000,
        sale: 1000000
    }
];

let productFilter = listProduct;
showProduct(productFilter);

function showProduct(productFilter) {
    count.innerText = productFilter.length;
    list.innerHTML = '';
    productFilter.forEach((item) => {
        let newItem = document.createElement('div');
        newItem.classList.add('products');

        let imageContainer = document.createElement('div');
        imageContainer.classList.add('pro');

        let newImage = new Image();
        newImage.src = item.image;
        newImage.style.width = '100%';
        imageContainer.appendChild(newImage); // Append newImage vào imageContainer trước
        newItem.appendChild(imageContainer);

        let prosContainer = document.createElement('div');
        prosContainer.classList.add('pros');

        let newTitle = document.createElement('h2');
        newTitle.innerText = item.name;
        prosContainer.appendChild(newTitle);

        let newPrice = document.createElement('p');
        newPrice.innerHTML = 'Giá gốc : <s>' + item.price.toLocaleString() + ' VND</s>';
        prosContainer.appendChild(newPrice);

        let newSale = document.createElement('p');
        newSale.innerHTML = 'Giá sale : ' + item.sale.toLocaleString() + ' VND';
        prosContainer.appendChild(newSale);

        let newButton = document.createElement('button');
        newButton.innerText = 'Chi tiết sản phẩm';
        newButton.onclick = function() {
            showSP(item.id);
        };

        prosContainer.appendChild(newButton);

        newItem.appendChild(prosContainer);
        list.appendChild(newItem);
    });
}

function showSP(productIndex) {
    switch (productIndex) {
        case 1:
            window.location.href = "product1.html";
            break;
        case 2:
            window.location.href = "product2.html";
            break;
        case 3:
            window.location.href = "product3.html";
            break;
        default:
            console.log('Product not found');
    }
}

function chiTietSP1() {
    window.location.href = "product1.html";
}

function chiTietSP2() {
    window.location.href = "product2.html";
}

function chiTietSP3() {
    window.location.href = "product3.html";
}

filter.addEventListener('submit', function(event) {
    event.preventDefault();
    let valueSearch = document.getElementById('search').value.toLowerCase();
    productFilter = listProduct.filter(item => {
        return item.name.toLowerCase().includes(valueSearch);
    });
    showProduct(productFilter);
});