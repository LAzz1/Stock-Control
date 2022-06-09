import { Component } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';

@Component({
  selector: 'app-home',
  templateUrl: 'home.page.html',
  styleUrls: ['home.page.scss'],
})

export class HomePage {
  public user = {
    name: "",
    senha: ""
  };

  public myForm: FormGroup;
  

  constructor(private formBuild: FormBuilder) {
    this.myForm = this.formBuild.group({
      'name': [this.user.name, Validators.compose([
        Validators.required
      ])],
      'senha': [this.user.senha, Validators.compose([
        Validators.required
      ])],
    });
  }

  /* validate() {
    console.log(this.myForm.value);
  }  */

}
