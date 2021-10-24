import { Component, EventEmitter, OnInit, Output } from '@angular/core';
import { FormBuilder, Validators } from '@angular/forms';
import { MatSnackBar } from '@angular/material/snack-bar';
import { EMPTY } from 'rxjs';
import { catchError } from 'rxjs/operators';

import { EnviarCertificadoService } from './enviar-certificado.service';

@Component({
  selector: 'app-enviar-certificado',
  templateUrl: './enviar-certificado.component.html',
  styleUrls: ['./enviar-certificado.component.scss']
})
export class EnviarCertificadoComponent implements OnInit {

  @Output() onEnviado = new EventEmitter()

  loading = false

  tiposCertificados$ = this.enviarCertificadoService.tiposCertificados$

  certificadoForm = this.formBuilder.group({
    certificado: ['', Validators.required],
    nome: ['', Validators.required],
    horas: [null, [Validators.required, Validators.min(1)]],
    tipo: [null, Validators.required],
  });

  constructor(
    private enviarCertificadoService: EnviarCertificadoService,
    private formBuilder: FormBuilder,
    private _snackBar: MatSnackBar,
  ) { }

  ngOnInit(): void {

    this.enviarCertificadoService.refreshTipos()
  }

  onSubmit() {

    this.loading = true
    this._snackBar.dismiss()

    this.enviarCertificadoService.enviaCertificado(this.certificadoForm.value)
      .pipe(
        catchError(
          error => {

            this.loading = false
            this._snackBar.open('erro', undefined, { panelClass: 'bg-danger' })

            return EMPTY
          }
        ),
      )
      .subscribe(
        () => {

          this.loading = false
          this._snackBar.open('certificado enviado'!, undefined, { panelClass: 'bg-success', duration: 3000 })

          this.certificadoForm.reset()

          this.onEnviado.emit()
        }
      )
  }
}
