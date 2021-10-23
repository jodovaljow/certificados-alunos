import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { BehaviorSubject } from 'rxjs';

import { environment } from 'src/environments/environment';
import { Aluno } from 'src/app/shared/types';

@Injectable({
  providedIn: 'root'
})
export class GridCertificadosService {

  alunoSelecionado$ = new BehaviorSubject<Aluno | null>(null)

  constructor(
    private httpClient: HttpClient,
  ) { }

  selecionarAluno(idAluno: number) {

    this.httpClient.get<Aluno>(environment.url_backend + '/aluno/' + idAluno, { withCredentials: true })
      .subscribe(
        aluno => this.alunoSelecionado$.next(aluno)
      )
  }
}