import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { BehaviorSubject, Observable } from 'rxjs';
import { tap } from 'rxjs/operators';

import { Certificado, Homologacao, StatusHomologacao } from 'src/app/shared/types';
import { environment } from 'src/environments/environment';

@Injectable({
  providedIn: 'root'
})
export class ViewCertificadoService {

  certificado$ = new BehaviorSubject<Certificado | null>(null)

  constructor(
    private httpClient: HttpClient,
  ) { }

  getCertificadoDetail(idCertificado: number): Observable<Certificado> {

    return this.httpClient.get<Certificado>(environment.url_backend + '/certificado/' + idCertificado + '/detail', { withCredentials: true })
      .pipe(
        tap(
          certificado => this.certificado$.next(certificado)
        )
      )
  }

  iniciarHomologacao(request: { id_certificado: number, status: StatusHomologacao, horas?: number, mensagem?: string }) {

    return this.httpClient.post<Homologacao>(environment.url_backend + '/homologacao', request, { withCredentials: true })
      .pipe(
        tap(
          homologacao => this.getCertificadoDetail(homologacao.certificado_id).subscribe()
        )
      )
  }
}
