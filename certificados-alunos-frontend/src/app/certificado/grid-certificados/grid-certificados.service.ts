import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { BehaviorSubject } from 'rxjs';

import { environment } from 'src/environments/environment';
import { Aluno } from 'src/app/shared/types';

@Injectable({
  providedIn: 'root'
})
export class GridCertificadosService {

  alunoExibindo$ = new BehaviorSubject<Aluno | null>(null)

  constructor(
    private httpClient: HttpClient,
  ) { }

  carregarAluno(idAluno: number | null | undefined) {

    if (!idAluno) {

      this.alunoExibindo$.next(null)
      return
    }

    this.httpClient.get<Aluno>(environment.url_backend + '/aluno/' + idAluno, { withCredentials: true })
      .subscribe(
        aluno => this.alunoExibindo$.next(aluno)
      )
  }

  recarregarAluno() {

    this.carregarAluno(this.alunoExibindo$.value?.id)
  }
}