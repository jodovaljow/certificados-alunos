import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { ReactiveFormsModule } from '@angular/forms';
import { MatCardModule } from '@angular/material/card';
import { MatFormFieldModule } from '@angular/material/form-field';
import { MatInputModule } from '@angular/material/input';
import { MatButtonModule } from '@angular/material/button';
import { MatSnackBarModule } from '@angular/material/snack-bar';
import { MatProgressBarModule } from '@angular/material/progress-bar';
import { MaterialFileInputModule } from '@damotech/ngx-material-file-input';
import { MatSelectModule } from '@angular/material/select';

import { EnviarCertificadoComponent } from './enviar-certificado.component';

@NgModule({
  declarations: [
    EnviarCertificadoComponent,
  ],
  imports: [
    CommonModule,
    ReactiveFormsModule,
    MatCardModule,
    MatFormFieldModule,
    MatProgressBarModule,
    MatSnackBarModule,
    MatInputModule,
    MatButtonModule,
    MaterialFileInputModule,
    MatSelectModule,
  ],
  exports: [
    EnviarCertificadoComponent,
  ]
})
export class EnviarCertificadoModule { }
