import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';

import { CertificadoComponent } from './certificado.component';
import { DashboardCertificadosComponent } from './dashboard-certificados/dashboard-certificados.component';
import { ViewCertificadoComponent } from './view-certificado/view-certificado.component';

const routes: Routes = [
  {
    path: 'certificados',
    component: CertificadoComponent,
    children: [
      {
        path: '',
        component: DashboardCertificadosComponent,
      },
      {
        path: ':id',
        component: ViewCertificadoComponent,
      },
    ]
  },
]

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class CertificadoRoutingModule { }
