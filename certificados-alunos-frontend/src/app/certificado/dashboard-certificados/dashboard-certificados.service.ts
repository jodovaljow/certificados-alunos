import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';

import { User } from 'src/app/shared/types';
import { environment } from 'src/environments/environment';

@Injectable({
  providedIn: 'root'
})
export class DashboardCertificadosService {

  constructor(
    private httpClient: HttpClient,
  ) { }

  queryAlunos(query: string): Observable<User[]> {

    return this.httpClient.get<User[]>(environment.url_backend + '/query/aluno', { params: { query }, withCredentials: true })
  }
}
