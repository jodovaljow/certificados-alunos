import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { FileInput } from '@damotech/ngx-material-file-input';
import { BehaviorSubject, Observable } from 'rxjs';

import { TipoCertificado } from 'src/app/shared/types';
import { environment } from 'src/environments/environment';

@Injectable({
  providedIn: 'root'
})
export class EnviarCertificadoService {

  tiposCertificados$ = new BehaviorSubject<TipoCertificado[]>([])

  constructor(
    private httpClient: HttpClient,
  ) { }

  enviaCertificado(formValue: { certificado: FileInput, nome: string, horas: number, tipo: string }): Observable<any> {

    const certificado = formValue.certificado.files[0]

    const endpoint = environment.url_backend + '/certificado'

    const formData: FormData = new FormData()
    formData.append('certificado', certificado, certificado.name)
    formData.append('nome', formValue.nome)
    formData.append('horas', '' + formValue.horas)
    formData.append('tipo_certificado', formValue.tipo)

    return this.httpClient
      .post(endpoint, formData, { withCredentials: true })
  }

  refreshTipos() {

    this.httpClient.get<TipoCertificado[]>(environment.url_backend + '/tipos', { withCredentials: true })
      .subscribe(
        tipos => this.tiposCertificados$.next(tipos)
      )
  }
}