import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { RouterModule, } from '@angular/router';
import { MatCardModule } from '@angular/material/card';
import { MatTableModule } from '@angular/material/table';

import { GridCertificadosComponent } from './grid-certificados.component';

@NgModule({
  declarations: [
    GridCertificadosComponent,
  ],
  imports: [
    CommonModule,
    RouterModule,
    MatCardModule,
    MatTableModule,
  ],
  exports: [
    GridCertificadosComponent,
  ]
})
export class GridCertificadosModule { }
