import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { ReactiveFormsModule } from '@angular/forms';
import { MatAutocompleteModule } from '@angular/material/autocomplete';
import { MatFormFieldModule } from '@angular/material/form-field';
import { MatInputModule } from '@angular/material/input';

import { DashboardCertificadosComponent } from './dashboard-certificados.component';
import { EnviarCertificadoModule } from '../enviar-certificado/enviar-certificado.module';
import { GridCertificadosModule } from '../grid-certificados/grid-certificados.module';

@NgModule({
  declarations: [
    DashboardCertificadosComponent,
  ],
  imports: [
    CommonModule,
    ReactiveFormsModule,
    MatAutocompleteModule,
    EnviarCertificadoModule,
    MatFormFieldModule,
    MatInputModule,
    GridCertificadosModule,
  ],
  exports: [
    DashboardCertificadosComponent,
  ]
})
export class DashboardCertificadosModule { }
