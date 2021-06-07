cart = {
  count: 0,
  items: []
}
if (localStorage.getItem('cart') != null) {
  cart = JSON.parse(localStorage.getItem('cart'));
  if (cart.count > 0) {
    $('.cart').css({
      "display": "block"
    });
    $('.cart-count').html(cart.count);
  }
}

function help_sound() {
  setTimeout(() => {
    const mus = document.getElementById('notifypop');
    mus.play();
    $('span[data-mod="question"]').show(300, function () {
      setTimeout(function () {
        $('span[data-mod="question"]').hide(300);
      }, 4000);
    });
  }, 10000);
  setInterval(() => {
    const mus = document.getElementById('notifypop');
    mus.play();
    $('span[data-mod="question"]').show(300, function () {
      setTimeout(function () {
        $('span[data-mod="question"]').hide(300);
      }, 4000);
    });
  }, 20000);
  document.removeEventListener('touchstart', help_sound);
}

document.addEventListener('touchstart', help_sound);

function add_to_cart() {
  document.querySelectorAll('a[data-smell]').forEach(elem => {
    $(elem).click(function (event) {
      event.stopImmediatePropagation();
      let flag = true;
      cart.items.forEach(item => {
        if (item.id == $(elem).attr('data-smell')) {
          item.value += 5;
          if ($(elem).parent().find('input[type="hidden"]').val() == '10') {
            item.price += item.initialPrice / 2;
          } else {
            item.price += item.initialPrice;
          }
          flag = false;
        }
      });
      if (flag) {
        temp = {};
        temp.id = $(elem).attr('data-smell');
        temp.value = parseInt($(elem).parent().find('input[type="hidden"]').val()) || 5;
        temp.price = parseInt($(elem).prev().find('span[data-sp="price"]').text());
        temp.initialPrice = parseInt($(elem).prev().find('span[data-sp="price"]').text());
        cart.count++
        cart.items.push(temp);
        $('.cart-count').html(cart.count);
        $('div[data-widget="cart"]').css({
          "display": "block"
        });
        localStorage.setItem('cart', JSON.stringify(cart))
      }
      $('span[data-mod="cart"]').show(300, function () {
        setTimeout(function () {
          $('span[data-mod="cart"]').hide(300);
        }, 1000);
      });
    });
  });
}

function post_render(calc_item, id_brand, id_category, search = '', sort = '', smells = 'smells') {
  $.post('/price_render.php', {
    calc_item: calc_item,
    id_brand: id_brand,
    id_category: id_category,
    search: search,
    sort: sort,
    smells: smells
  }, function (data) {
    if (calc_item == 0) {
      $('.catalog-body').remove();
    }
    $($.parseHTML(data)).insertBefore($('input[data-a="a"]'));
  })
  $(document).ajaxComplete(function () {
    add_to_cart();
    const elem = $('div[data-length]').attr('data-length');
    const item_count = document.querySelectorAll('.catalog-item').length;
    if (elem < 4) {
      $('.catalog-body').css({
        "grid-template-columns": "repeat(" + elem + ", 1fr)"
      });
    }
    if (elem <= 8 || elem == item_count) {
      $('a[data-load]').css({
        'display': 'none'
      });
    }
    if (elem > 8) {
      $('a[data-load]').css({
        'display': 'block'
      });
    }
    $('.catalog-body').show('fast', 'linear');
  });
}
post_render(0, 0, 0);
$('.catalog-body').show('fast', 'linear');
$('#js-carousel').owlCarousel({
  loop: true,
  autoplayHoverPause: true,
  slideTransition: 'linear',
  items: 3,
  margin: 30,
  nav: true,
  dots: false,
  navText: [
    '<span class="arrow-owl arrow-left"><</span>',
    '<span class="arrow-owl arrow-right">></span>'
  ],
  responsive: {
    0: {
      items: 1,
      margin: 0,
      nav: false
    },
    768: {
      items: 2
    },
    1180: {
      items: 3
    }
  }
});
$(".next_button").click(function () {
  owl.trigger("next.owl.carousel");
});
$(".prev_button").click(function () {
  owl.trigger("prev.owl.carousel");
});
$(document).ready(function () {
  $(".menuToggle").click(function () {
    $(this).toggleClass("active");
    $('.menu').slideToggle(300, function () {
      if ($(this).css('display') === "none") {
        $(this).removeAttr('style');
      }
    });
  });
});
$(document).ready(function () {
  $(".menu").on("click", "a", function (event) {
    event.preventDefault();
    var id = $(this).attr('href'),
      top = $(id).offset().top;
    $('body,html').animate({
      scrollTop: top
    }, 1500);
  });
  $(".mib").on("click", function (event) {
    event.preventDefault();
    var id = $(this).attr('href'),
      top = $(id).offset().top;
    $('body,html').animate({
      scrollTop: top
    }, 1500);
  });
});

function sort_price(sort, boxes = '') {
  if ($('div[data-sort]').attr('data-sort') == 'sort') {
    if (($('.brand-container').html() == '') && $('.catalog-categories').children().hasClass('active') == false) {
      post_render(0, 0, 0, '', sort);
    } else {
      if (($('.brand-container').html() == '') && $('.catalog-categories').children().hasClass('active')) {
        post_render(0, 0, $('.active').attr('data-category'), '', sort);
      } else {
        if (($('.brand-container').html() != '') && $('.catalog-categories').children().hasClass('active') == false) {
          post_render(0, $('.brands-list-item-active').attr('data-brand'), 0, '', sort);
        } else {
          if (($('.brand-container').html() != '') && $('.catalog-categories').children().hasClass('active')) {
            post_render(0, $('.brands-list-item-active').attr('data-brand'), $('.active').attr('data-category'), '', sort);
          }
        }
      }
    }
  }
  if ($('div[data-sort]').attr('data-sort') == 'sort_box') {
    if (($('brand-container').html() == '') && $('.catalog-categories').children().hasClass('active') == false) {
      post_render(0, 0, 0, '', sort, boxes);
    } else {
      if (($('brand-container').html() == '') && $('.catalog-categories').children().hasClass('active')) {
        post_render(0, 0, $('.active').attr('data-category'), '', sort, boxes);
      } else {
        if (($('brand-container').html() != '') && $('.catalog-categories').children().hasClass('active') == false) {
          post_render(0, $('.brands-list-item-active').attr('data-brand'), 0, '', sort, boxes);
        } else {
          if (($('brand-container').html() != '') && $('.catalog-categories').children().hasClass('active')) {
            post_render(0, $('.brands-list-item-active').attr('data-brand'), $('.active').attr('data-category'), '', sort, boxes);
          }
        }
      }
    }
  }
}

$('a[data-load="download"]').click(function () {
  const calc_item = document.querySelectorAll('.catalog-item').length;
  if (($('.brand-container').html() == '') && $('.catalog-categories').children().hasClass('active') == false) {
    post_render(calc_item, 0, 0);
  } else {
    if (($('.brand-container').html() == '') && $('.catalog-categories').children().hasClass('active')) {
      post_render(calc_item, 0, $('.catalog-categories').find('.active').attr('data-category'));
    } else {
      if (($('.brand-container').html() != '') && $('.catalog-categories').children().hasClass('active') == false) {
        post_render(calc_item, $('.brands-list-item-active').attr('data-brand'), 0);
      } else {
        if (($('.brand-container').html() != '') && $('.catalog-categories').children().hasClass('active')) {
          post_render(calc_item, $('.brands-list-item-active').attr('data-brand'), $('.catalog-categories').find('.active').attr('data-category'));
        }
      }
    }
  }
  $('.catalog-body').show('fast', 'linear');
});
$('body').click((e) => {
  if (e.target.classList.contains('brands-button') && $('.brands-list').children().length == 0) {
    $('input[name]').val(' ');
    $.post('/brands_render.php', {
      go_render: 'Go'
    }, function (data) {
      $('.brands-list').append($.parseHTML(data));
      $('.brands-list').show('slow', 'linear');
    });
    $(document).ajaxComplete(function () {
      document.querySelectorAll('.brands-list-item').forEach(elem => {
        $(elem).click(() => {
          document.querySelectorAll('.brands-list-item').forEach(element => {
            if ($(element).hasClass('brands-list-item-active')) {
              $(element).removeClass('brands-list-item-active');
            }
          });
          $(elem).addClass('brands-list-item-active');
          if (document.querySelectorAll('.active') == null) {
            post_render(0, $(elem).attr('data-brand'), 0);
          } else {
            post_render(0, $(elem).attr('data-brand'), $('.active').attr('data-category'));
          }
          $(elem).removeClass('brands-list-item');
          const item_active = $('.brands-list-item-active');
          item_active.off('click');
          item_active.append('<div class="close-item">X</div>');
          $('.brand-container').html($(elem));
          $('.close-item').click(() => {
            $(item_active).remove();
            if (document.querySelectorAll('.active') == null) {
              post_render(0, 0, 0);
            } else {
              post_render(0, 0, $('.active').attr('data-category'));
            }
          });
        })
      });
    });
  } else {
    $('.brands-list').hide('slow', 'linear');
    $('.brands-list').children().remove();
  }
});

document.querySelector('.flex-style').querySelectorAll('.category-item').forEach(elem => {
  $(elem).click(() => {
    $('input[name]').val('');
    $(elem).toggleClass('active').siblings().removeClass('active');
    if ($('brand-container').html() == '') {
      if ($(elem).hasClass('active')) {
        post_render(0, 0, $(elem).attr('data-category'));
      } else {
        post_render(0, 0, 0);
      }
    } else {
      if ($(elem).hasClass('active')) {
        post_render(0, $('.brands-list-item-active').attr('data-brand'), $(elem).attr('data-category'));
      } else {
        post_render(0, $('.brands-list-item-active').attr('data-brand'), 0);
      }
    }
  });
})
$('input[name="search"]').on('input', function () {
  if ($(this).val() != '#') {
    $('.brands-list-item-active').remove();
    $('.catalog-categories')[0].querySelectorAll('.category-item').forEach(elem => {
      elem.classList.remove('active');
    })
    if ($('div[data-sort]').attr('data-sort') == 'sort') {
      post_render(0, 0, 0, $(this).val());
    }
    if ($('div[data-sort]').attr('data-sort') == 'sort_box') {
      post_render(0, 0, 0, $(this).val(), '', 'boxes');
    }
    $(document).ajaxComplete(function () {
      document.querySelectorAll('div[data-tracking]').forEach(elem => {
        elem.querySelectorAll('.cat-name').forEach(element => {
          const result = element.innerText.replace(new RegExp($(this).val(), 'i'), '<span class="search">' + $(this).val() + '</span>');
          element.innerHTML = result;
        });
        elem.querySelector('.cat-value').innerHTML = elem.innerText.replace(new RegExp($(this).val(), 'i'), '<span class="search">' + $(this).val() + '</span>');
      });
      $('.catalog-body').show('fast', 'linear');
    });
  }
})
$('div[data-sort]').click(() => {
  if ($('div[data-sort]').children().length == 0) {
    sort = 'hi';
    $('div[data-sort]').append('<span class="hi"> по возростанию цены<i class="fa fa-arrow-up arrow_sort" aria-hidden="true"></i></span>');
    if ($('div[data-sort]').attr('data-sort') == 'sort') {
      sort_price(sort);
    }
    if ($('div[data-sort]').attr('data-sort') == 'sort_box') {
      sort_price(sort, 'boxes');
    }
    $('.catalog-body').show('fast', 'linear');
  } else {
    if ($('div[data-sort]').children().hasClass('hi')) {
      sort = 'low';
      $('div[data-sort]').children().remove();
      $('div[data-sort]').append('<span class="low"> по убыванию цены<i class="fa fa-arrow-down arrow_sort" aria-hidden="true"></i></span>');
      if ($('div[data-sort]').attr('data-sort') == 'sort') {
        sort_price(sort);
      }
      if ($('div[data-sort]').attr('data-sort') == 'sort_box') {
        sort_price(sort, 'boxes');
      }
      $('.catalog-body').show('fast', 'linear');
    } else {
      if ($('div[data-sort]').children().hasClass('low')) {
        $('div[data-sort]').children().remove();
        if ($('div[data-sort]').attr('data-sort') == 'sort') {
          sort_price('');
        }
        if ($('div[data-sort]').attr('data-sort') == 'sort_box') {
          sort_price('', 'boxes');
        }
        $('.catalog-body').show('fast', 'linear');
      }
    }
  }
})

function send_form_data() {
  $('a[data-button]').click(function () {
    if ($('input[name="number"]').val() == '' || $('input[name="name"]').val() == '') {
      if ($('input[name="number"]').val() == '') {
        $('input[name="number"]').css({
          "border": "3px solid red"
        });
      }
      if ($('input[name="name"]').val() == '') {
        $('input[name="name"]').css({
          "border": "3px solid red"
        });
      }
    } else {
      let message_text = '';
      let message_status = '';
      message_text += "Телефон: " + $('input[name="number"]').val() + "%0A";
      message_text += "Имя: " + $('input[name="name"]').val() + "%0A";
      if ($(this).attr('data-button') == 'order') {
        message_status = "!ЗАКАЗ!%0A";
        document.querySelectorAll('.order-item').forEach(item => {
          message_text += $(item).find('.order-text').text() + " " + $(item).find('input[name="count"]').val() + "мл " + $(item).find('span[data-price]').text() + "рублей%0A";
        });
        message_text += "Итого " + $('.sum-result').text();
        $('span[data-mod="order"]').show(800, function () {
          setTimeout(function () {
            $('span[data-mod="order"]').hide(800);
          }, 1000);
        });
      }
      if ($(this).attr('data-button') == 'message') {
        message_status = "!СООБЩЕНИЕ!%0A";
        if ($('textarea[name="message"]').val() != '') {
          message_text += $('textarea[name="message"]').val();
        }
        $('span[data-mod="message"]').show(800, function () {
          setTimeout(function () {
            $('span[data-mod="message"]').hide(800);
          }, 1000);
        });
        $('.chat-form').hide('fast', 'linear');
      }
      $.post('/telegram_bot.php', {
        status: message_status,
        text: message_text
      }, function (data) {
        if (data) {
          $('.cart').remove();
          $('.cart-body').remove();
          $('body').css({
            "pointer-events": "auto"
          });
          localStorage.removeItem('cart');
        }
      });
    }
  });
}
send_form_data();

function sum() {
  let sum = 0;
  document.querySelectorAll('span[data-price]').forEach(elem => {
    sum += parseInt(elem.innerHTML);
  });
  $('.sum-result').html(sum + '₽');
}
$('div[data-widget="cart"]').click(() => {
  $.post('/cart_render.php', {
    cart: cart
  }, function (data) {
    $('body').prepend($.parseHTML(data));
    $('body').css({
      "pointer-events": "none"
    });
  })
  $(document).ajaxComplete(function () {
    document.querySelectorAll('.order-img').forEach(elem => {
      if (elem.children.length == 0) {
        elem.innerHTML = 'Фото временно недоступно';
        elem.classList.add('no-img');
      }
    });
    if (document.querySelector('.cart-body') != null) {
      $('body').css({
        "pointer-events": "none"
      });
      $('.cart-body').css({
        "pointer-events": "auto"
      });
    }
    $('.close').click(() => {
      $('.cart-body').remove();
      $('body').css({
        "pointer-events": "auto"
      });
    });
    sum();
    $('i[data-count="plus"]').click(function (event) {
      event.stopImmediatePropagation();
      $(this).parent().find('input[name="count"]')[0].stepUp();
      if ($(this).parents().eq(2).find('input[name="min"]').val() == '10') {
        $(this).parents().eq(2).find('span[data-price]').text(parseInt($(this).parents().eq(2).find('span[data-price]').text()) + parseInt($(this).parents().eq(2).find('input[name="prc"]').val()) / 2);
      } else {
        $(this).parents().eq(2).find('span[data-price]').text(parseInt($(this).parents().eq(2).find('span[data-price]').text()) + parseInt($(this).parents().eq(2).find('input[name="prc"]').val()));
      }
      cart.items.forEach(elem => {
        if ($(this).parents().eq(2).attr('data-id') == elem.id) {
          if ($(this).parent().find('input').attr('min') == '10') {
            elem.price += elem.initialPrice / 2;
          } else {
            elem.price += elem.initialPrice;
          }
          elem.value += 5;
        }
      });
      localStorage.setItem('cart', JSON.stringify(cart));
      sum();
    });
    $('i[data-count="minus"]').click(function (event) {
      event.stopImmediatePropagation();
      if ($(this).parent().find('input[name="count"]').val() > 5) {
        $(this).parent().find('input[name="count"]')[0].stepDown();
        if ($(this).parents().eq(2).find('input[name="min"]').val() == '10') {
          $(this).parents().eq(2).find('span[data-price]').text(parseInt($(this).parents().eq(2).find('span[data-price]').text()) - parseInt($(this).parents().eq(2).find('input[name="prc"]').val()) / 2);
        } else {
          $(this).parents().eq(2).find('span[data-price]').text(parseInt($(this).parents().eq(2).find('span[data-price]').text()) - parseInt($(this).parents().eq(2).find('input[name="prc"]').val()));
        }
        cart.items.forEach(elem => {
          if ($(this).parents().eq(2).attr('data-id') == elem.id) {
            if ($(this).parent().find('input').attr('min') == '10') {
              elem.price -= elem.initialPrice / 2;
            } else {
              elem.price -= elem.initialPrice;
            }
            elem.value -= 5;
          }
        });
        localStorage.setItem('cart', JSON.stringify(cart));
        sum();
      }
    });
    $('.delete').click(function (event) {
      event.stopImmediatePropagation()
      const item_index = cart.items.indexOf($(this).parent().attr('data-id'));
      cart.items.splice(item_index, 1);
      cart.count--;
      $('.cart-count').html(cart.count);
      if (cart.count == 0) {
        $('div[data-widget="cart"]').css({
          "display": "none"
        });
        $(this).parents().eq(2).remove();
        $('body').css({
          "pointer-events": "auto"
        });
      }
      localStorage.setItem('cart', JSON.stringify(cart));
      $(this).parent().remove();
      sum();
    });
    send_form_data();
  });
});
$('div[data-widget="chat"]').click(() => {
  $('.chat-form').toggle('fast', 'linear');
});
$('div[data-cat="boxes"] ').click(() => {
  post_render(0, 0, 0, '', '', 'boxes');
  $('input[name="search"]').val('');
  $('input[name="search"]').attr('placeholder', 'Поиск в аромобоксах:');
  $('div[data-cat="smells"]').removeClass('active');
  $('div[data-cat="boxes"]').addClass('active');
  $('div[data-sort]').attr('data-sort', 'sort_box');
  $('.flex-style').css({
    'display': 'none'
  });
  $('.brands').css({
    'display': 'none'
  });
  $('.catalog-categories').css({
    'justify-content': 'flex-end'
  });
});
$('div[data-cat="smells"]').click(() => {
  $('div[data-cat="smells"]').addClass('active');
  $('input[name="search"]').val('');
  $('input[name="search"]').attr('placeholder', 'Поиск в ароматах:');
  $('.flex-style').css({
    'display': 'flex'
  });
  $('.brands').css({
    'display': 'block'
  });
  $('div[data-cat="boxes"]').removeClass('active');
  $('.catalog-categories').css({
    'justify-content': 'space-between'
  });
  $('.catalog-body').remove();
  $('div[data-sort]').attr('data-sort', 'sort');
  post_render(0, 0, 0);
  add_to_cart();
});

function blocktimer(idtimer, timetimes, timesnows, member) {
  var timetimes = timetimes;
  timetimes = timetimes.split(", ");
  var timesnows = timesnows;
  var ts = new Date(timetimes[0], timetimes[1], timetimes[2]);
  if ((new Date()) > ts) {
    ts = (new Date()).getTime() + timesnows;
  }
  $(idtimer).countdown({
    timestamp: ts,
    callback: function (days, hours, minutes, seconds) {}
  });
}

$(document).ready(function () {
  blocktimer('#countdown', '2021, 5, 8', 7 * 24 * 60 * 60 * 1000);
});