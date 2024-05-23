let list = document.getElementById('list');
let filter = document.querySelector('.filter');
let count = document.getElementById('count');
let listProduct = [{
        id: 1,
        name: 'Áo polo',
        price: 30000,
        quantity: 0,
        image: 'assets/img/ao.jpg',
        nature: {
            color: ['blue'],
            size: ['XS', 'S', 'M', 'L', 'XL'],
            type: 'Áo'
        }
    },
    {
        id: 2,
        name: 'Áo polo',
        price: 30000,
        quantity: 0,
        image: 'assets/img/ao.jpg',
        nature: {
            color: ['blue'],
            size: ['XS', 'S', 'M', 'L', 'XL'],
            type: 'Áo'
        }
    },
    {
        id: 3,
        name: 'Áo polo',
        price: 30000,
        quantity: 0,
        image: 'assets/img/ao.jpg',
        nature: {
            color: ['blue'],
            size: ['XS', 'S', 'M', 'L', 'XL'],
            type: 'Áo'
        }
    },
    {
        id: 4,
        name: 'Áo polo',
        price: 30000,
        quantity: 0,
        image: 'assets/img/ao1.jpg',
        nature: {
            color: ['black'],
            size: ['XS', 'S', 'M', 'L', 'XL'],
            type: 'Áo'
        }
    },
    {
        id: 5,
        name: 'Áo thun',
        price: 30000,
        quantity: 0,
        image: 'assets/img/ao1.jpg',
        nature: {
            color: ['black'],
            size: ['XS', 'S', 'M', 'L', 'XL'],
            type: 'Áo'
        }
    },
    {
        id: 6,
        name: 'Áo polo',
        price: 30000,
        quantity: 0,
        image: 'assets/img/ao1.jpg',
        nature: {
            color: ['black'],
            size: ['XS', 'S', 'M', 'L', 'XL'],
            type: 'Áo'
        }
    },
    {
        id: 7,
        name: 'Quần Âu',
        price: 30000,
        quantity: 0,
        image: 'assets/img/quan.jpg',
        nature: {
            color: ['black'],
            size: ['XS', 'S', 'M', 'L', 'XL'],
            type: 'Quần'
        }
    },
    {
        id: 8,
        name: 'Quần ÂU',
        price: 30000,
        quantity: 0,
        image: 'assets/img/quan.jpg',
        nature: {
            color: ['black'],
            size: ['XS', 'S', 'M', 'L', 'XL'],
            type: 'Quần'
        }
    },
    {
        id: 9,
        name: 'Quần Âu',
        price: 30000,
        quantity: 0,
        image: 'assets/img/quan.jpg',
        nature: {
            color: ['black'],
            size: ['XS', 'S', 'M', 'L', 'XL'],
            type: 'Quần'
        }
    },
];
let productFilter = listProduct;
showProduct(productFilter);

function showProduct(productFilter) {
    count.innerText = productFilter.length;
    list.innerHTML = '';
    productFilter.forEach((item) => {
        let newItem = document.createElement('div');
        newItem.classList.add('item');
        // Create image
        let newImage = new Image();
        newImage.src = item.image;
        newItem.appendChild(newImage);
        // Create product name
        let newTitle = document.createElement('div');
        newTitle.classList.add('title');
        newTitle.innerText = item.name;
        newItem.appendChild(newTitle);
        // Create price
        let newPrice = document.createElement('div');
        newPrice.classList.add('price');
        newPrice.innerText = 'Giá : ' + item.price.toLocaleString() + 'đ';
        newItem.appendChild(newPrice);

        list.appendChild(newItem);
    });
}

filter.addEventListener('submit', function(event) {
    event.preventDefault();
    let valueSearch = document.getElementById('search').value;

    // productFilter = listProduct.filter(item => {

    //     return false;
    // });
    let valueFitler = event.target.elements;
    productFilter = listProduct.filter(item => {
        if (!item.name.toLowerCase().includes(valueSearch.toLowerCase())) {
            return false;
        }
        //  else if (document.getElementById('search').value == '') {
        //     document.getElementById('thongbao').innerHTML = 'Nhập tên sản phẩm';
        //     return false;
        // }
        //Lọc lựa chọn
        if (valueFitler.category.value !== '') {
            if (item.nature.type !== valueFitler.category.value) {
                return false;
            }
        }
        //Lọc màu
        if (valueFitler.color.value !== '') {
            if (!item.nature.color.includes(valueFitler.color.value)) {
                return false;
            }
        }
        //Lọc giá tiền
        if (valueFitler.minPrice.value !== '') {
            if (item.price < valueFitler.minPrice.value) {
                return false;
            }
        }

        if (valueFitler.maxPrice.value !== '') {
            if (item.price > valueFitler.maxPrice.value) {
                return false;
            }
        }
        return true;
    });

    showProduct(productFilter);
});


console.log(listProduct);