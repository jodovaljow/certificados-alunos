export type User = {
    id: number
    name: string
    email: string
    is_aluno: boolean
    is_homologador: boolean
}

type Aluno = {
    id: number
    certificados: Certificado[]
    user: User
}

type Certificado = {
    id: number
    nome: string
    horas: number
    aluno?: Aluno
    homologacao: Homologacao
    tipo_certificado: TipoCertificado
}

type TipoCertificado = {
    id: number
    tipo: string
}

type Homologacao = {
    id: number
    updated_at: string
    horas: number
    status: StatusHomologacao
    homologador_id: number
    certificado_id: number
}

export type StatusHomologacao = 'iniciado' | 'homologado' | 'negado'