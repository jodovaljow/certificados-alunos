import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { HttpClientModule } from '@angular/common/http';
import { MatTableModule } from '@angular/material/table';
import { MatCardModule } from '@angular/material/card';

import { CertificadoComponent } from './certificado.component';
import { CertificadoRoutingModule } from './certificado-routing.module';
import { TopoModule } from '../topo/topo.module';
import { EnviarCertificadoModule } from './enviar-certificado/enviar-certificado.module';
import { ViewCertificadoModule } from './view-certificado/view-certificado.module';
import { DashboardCertificadosModule } from './dashboard-certificados/dashboard-certificados.module';
import { GridCertificadosModule } from './grid-certificados/grid-certificados.module';

@NgModule({
  declarations: [
    CertificadoComponent,
  ],
  imports: [
    CommonModule,
    HttpClientModule,
    MatTableModule,
    MatCardModule,
    CertificadoRoutingModule,
    TopoModule,
    EnviarCertificadoModule,
    ViewCertificadoModule,
    DashboardCertificadosModule,
    GridCertificadosModule,
  ],
  exports: [
    CertificadoComponent,
  ]
})
export class CertificadoModule { }
