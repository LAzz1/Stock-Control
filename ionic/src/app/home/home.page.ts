import { Component } from '@angular/core';
import { ApiService } from '../api.service';
import { AlertController } from '@ionic/angular';

@Component({
  selector: 'app-home',
  templateUrl: 'home.page.html',
  styleUrls: ['home.page.scss'],
})
export class HomePage {
  products: any = [];

  constructor(
    public _apiService: ApiService,
    public alertController: AlertController
  ) {
    this.getProducts();
  }

  getProducts() {
    this._apiService.getProducts().subscribe((res: any) => {
      console.log("SUCCESS ===", res);
      this.products = res;
    }, (error: any) => {
      console.log("ERROR ===", error);
    })
  }

  ngOnInit() {
    this._apiService.getProducts().subscribe((res: any) => {
      var prodExpiration = []
      var splittedProdExpiration = []

      var rawTodayDate = new Date().toLocaleDateString();
      var splittedTodayDate = rawTodayDate.split('/');
      var expiratedProducts = []

      this.products.forEach(function (data) {
        prodExpiration.push(data.expiration)
        splittedProdExpiration.push(data.expiration.split('-'))
      })
      console.log(splittedProdExpiration,splittedTodayDate)

      for (let i = 0; i < splittedProdExpiration.length; i++) {
        if(splittedTodayDate[2] == splittedProdExpiration[i][0] && splittedTodayDate[1] == splittedProdExpiration[i][1]){
          if((Number(splittedProdExpiration[i][2])+7) - Number(splittedProdExpiration[i][2]) <= 7){
            expiratedProducts.push(this.products[i])
          }
        }
      }
      var expiratedMsg="";
      expiratedProducts.forEach(function(data){
          expiratedMsg+=`${data.name} do lote ${data.lote}<br>`
      })

      if(expiratedProducts.length>0){
        this.presentAlert(expiratedMsg);
      }
    })
  }

  async presentAlert(expiratedMsg) {
    const alert = await this.alertController.create({
      cssClass: 'my-custom-class',
      header: 'Validade dos produtos',
      message: expiratedMsg,
      buttons: ['OK']
    });

    await alert.present();

    const { role } = await alert.onDidDismiss();
    console.log('onDidDismiss resolved with role', role);
  }

}
