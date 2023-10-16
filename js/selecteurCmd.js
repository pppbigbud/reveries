document.addEventListener('DOMContentLoaded', function () {
  const orderDropdown = document.getElementById('orderDropdown');
  const selectedOrderDetails = document.getElementById('selectedOrderDetails');

  orderDropdown.addEventListener('change', function () {
      const selectedOrderId = orderDropdown.value;

      if (selectedOrderId) {
          // Recherchez la commande correspondante dans les données fictives
          const selectedOrder = fake_orders.find(order => order.order_id === selectedOrderId);

          if (selectedOrder) {
              // Affichez les détails de la commande sélectionnée
              const detailsHTML = `
                  <div class="commande">
                      <p>Date : ${new Date(selectedOrder.order_date).toLocaleDateString()}</p>
                      <ul>
                          ${Object.entries(selectedOrder.order_items).map(([product, quantity]) => `<li>${product} x ${quantity}</li>`).join('')}
                      </ul>
                      <p>Total : ${selectedOrder.order_total}</p>
                  </div>
              `;

              selectedOrderDetails.innerHTML = detailsHTML;
          } else {
              selectedOrderDetails.innerHTML = 'Aucune commande correspondante trouvée.';
          }
      } else {
          selectedOrderDetails.innerHTML = '';
      }
  });
});
