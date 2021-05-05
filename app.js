let sortableTable = $('#list');
const submit = $('.button-submit');

sortableTable.sortable();

submit.click(() => {
  let params = sortableTable.sortable("toArray", {attribute: 'value'});
  console.log(params);
  $.post("database/list.php", {value: params}, function() {
    window.location.href="list.php?success";
  });
});