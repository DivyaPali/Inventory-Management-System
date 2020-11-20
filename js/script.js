//UI Controller
const UICtrl =(function(){
  const UIselectors = {
    productTab : `#product-tab`,
    supplierTab : `#supplier-tab`,
    storageTab : `#storage-tab`,
    viewProductTable : `#view-product-table`,
    addProductTable : `#add-product-table`,
    viewProdBtn : `.view-prod-btn`,
    addProdBtn : `.add-prod-btn`,
    modifyProdBtn : `.modify-prod-btn`,
    deleteProdBtn : `.delete-prod-btn`,
    productTableCaption : `#product-table-caption`,
    prodCheck: `#prod-check`,
    prodRemove: `#prod-remove`,
    prodIdIP : `#product-id`,
    prodNameIP : `#product-name`,
    prodCostIP : `#product-cost`,
    prodQuantityIP : `#product-quantity`,
    storageNoIP : `#storage-no`,
    viewSupplyBtn : `.view-supply-btn`,
    addSupplyBtn : `.add-supply-btn`,
    modifySupplyBtn : `.modify-supply-btn`,
    deleteSupplyBtn : `.delete-supply-btn`,
    viewStorageBtn : `.view-storage-btn`,
    addStorageBtn : `.add-storage-btn`,
    modifyStorageBtn : `.modify-storage-btn`,
    deleteStorageBtn : `.delete-storage-btn`
  }

  //Public Methods
  return{
    hideAllTables : function(){
      document.querySelector(UIselectors.viewProductTable).style.display = 'none';
      document.querySelector(UIselectors.addProductTable).style.display = 'none';
    },
    showViewProduct : function(){
      document.querySelector(UIselectors.viewProductTable).style.display = 'block';
      document.querySelector(UIselectors.addProductTable).style.display = 'none';
      document.querySelector(UIselectors.productTableCaption).innerHTML = `Product Details`;
    },
    showAddProduct : function(){
      document.querySelector(UIselectors.viewProductTable).style.display = 'none';
      document.querySelector(UIselectors.addProductTable).style.display = 'block';
    },
    showModifyProduct : function(){
      document.querySelector(UIselectors.viewProductTable).style.display = 'block';
      document.querySelector(UIselectors.addProductTable).style.display = 'none';
      document.querySelector(UIselectors.productTableCaption).innerHTML = `Select Product To Modify`;
      // document.querySelector(UIselectors.viewProductTable).addEventListener('click',(e)=>{
      //   console.log(123);
      //   if(e.target.className === '')
      // })
    },
    showDeleteProduct : function(){
      document.querySelector(UIselectors.viewProductTable).style.display = 'block';
      document.querySelector(UIselectors.addProductTable).style.display = 'none';
      document.querySelector(UIselectors.productTableCaption).innerHTML = `Select Product To Delete`;
    },
    getProductInput : function(){
      return{
        prodId: document.querySelector(UIselectors.prodIdIP).value,
        prodName: document.querySelector(UIselectors.prodNameIP).value,
        prodCost: document.querySelector(UIselectors.prodCostIP).value,
        prodQuantity: document.querySelector(UIselectors.prodQuantityIP).value,
        storageNo: document.querySelector(UIselectors.storageNoIP).value
      }
  },
  clearInput : function(){
    document.querySelector(UIselectors.prodIdIP).value = null;
    document.querySelector(UIselectors.prodNameIP).value = '';
    document.querySelector(UIselectors.prodCostIP).value = null;
    document.querySelector(UIselectors.prodQuantityIP).value = null;
    document.querySelector(UIselectors.storageNoIP).value = '';
  },
  getSelectors: function(){
    return UIselectors;
  }
}
})();

//Item Controller
const ItemCtrl = (function(){
  //Item Constructor
  const Item = function(pid,pname,pcost,pqty,psno){
    this.pid = pid;
    this.pname = pname;
    this.pcost = pcost;
    this.pqty = pqty;
    this.psno = psno;
  }
  //Public Methods
  return{
    addNewProduct:function(id,name,cost,qty,sno){
      //create new row
      newRow = new Item(id,name,cost,qty,sno);
      return newRow;
    }
  }
})();

//App Controller
const App = (function(UICtrl){
  //Load Event Listeners
  const loadEventListeners = function(){
    //Get UIselectors
    const uiSelector = UICtrl.getSelectors();
    //Product tab - hide all tables
    document.querySelector(uiSelector.productTab).addEventListener('click',productTabOnclick);
    //Add products - show table
    document.querySelector(uiSelector.viewProdBtn).addEventListener('click',showViewProdTable);
    //Add products - show table
    document.querySelector(uiSelector.addProdBtn).addEventListener('click',showAddProdTable);
    //Add Products - check button
    document.querySelector(uiSelector.prodCheck).addEventListener('click',addProduct);
    //Modify products - show table
    document.querySelector(uiSelector.modifyProdBtn).addEventListener('click',showModifyProdTable);
    //Delete products - show table
    document.querySelector(uiSelector.deleteProdBtn).addEventListener('click',showDeleteProdTable);
    //Supplier tab - hide all tables
    document.querySelector(uiSelector.supplierTab).addEventListener('click',supplierTabOnclick);
    //Storage tab - hide all tables
    document.querySelector(uiSelector.storageTab).addEventListener('click',storageTabOnclick);  
  }

  //View products - show table
  const showViewProdTable = function(e){
    //set UI for view product table
    UICtrl.showViewProduct();

    e.preventDefault();
  }  

  //Add products - show table
  const showAddProdTable = function(e){
    //set UI for add product table
    UICtrl.showAddProduct();

    e.preventDefault();
  }  

  //Modify products - show table
  const showModifyProdTable = function(e){
    //set UI for modify product table
    UICtrl.showModifyProduct();

    e.preventDefault();
  }  

  //Delete products - show table
  const showDeleteProdTable = function(e){
    //set UI for modify product table
    UICtrl.showDeleteProduct();

    e.preventDefault();
  }  

  //Add Product
  const addProduct = function(e){
    //Get IP from UI
    const input = UICtrl.getProductInput();
    //Check for null inputs
    if(input.prodId !== null || input.prodName !=='' || input.prodCost !== null || input.prodQuantity !== null || input.storageNo !== ''){
      //Add Product
      const newRow = ItemCtrl.addNewProduct(input.prodId,input.prodName,input.prodCost,input.prodQuantity,input.storageNo);  
      console.log(newRow);
      
      //store in database
      ////////////////////////////////////////////////////

      //Clear Fields
      UICtrl.clearInput();
    }

    e.preventDefault();
  }

  //productTab Onclick
  const productTabOnclick = function(e){
    //Hide all tables
    UICtrl.hideAllTables();
    e.preventDefault();
  } 

  //supplier Tab Onclick
  const supplierTabOnclick = function(e){
    //Hide all tables
    UICtrl.hideAllTables();
    e.preventDefault();
  } 

  //storage Tab Onclick
  const storageTabOnclick = function(e){
    //Hide all tables
    UICtrl.hideAllTables();
    e.preventDefault();
  } 

  //public Methods
  return{
    init: function(){
      //Hide all tables
      UICtrl.hideAllTables();
      //load Event Listeners
      loadEventListeners();
    }
  }
  
})(UICtrl);

//Initialize APP
App.init();
